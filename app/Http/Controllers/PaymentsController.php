<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luigel\Paymongo\Facades\Paymongo;
use App\Models\Payments;
use App\Models\ProjectStats;
use App\Http\Controllers\UserPreferenceController;
use Omnipay\Omnipay;

use Auth;

class PaymentsController extends Controller
{

    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }


    public static function savePayment(array $requestArg): void
    {
        if(!(Payments::where('payment_id', $requestArg['data']['attributes']['data']['id'])->first())){
            $dataVar = new Payments;
            $dataVar->proj_id = $requestArg['data']['attributes']['data']['attributes']['metadata']['project_id'];
            $dataVar->user_id = $requestArg['data']['attributes']['data']['attributes']['metadata']['user_id'];
            $dataVar->payment_id = $requestArg['data']['attributes']['data']['id'];
            $dataVar->amount = $requestArg['data']['attributes']['data']['attributes']['net_amount']/100;
    
            $dataVar->save();
            
        }
    }


    public static function PaymentStatus(int $ProjId, string $status): Object
    {
        if($status == 'success'){
            (new UserPreferenceController)->updateSupported($ProjId);
            $data = array(
                'idArg' => $ProjId,
                'title' => 'Success',
                'text' => 'successful',
                'icon' => 'fa-regular fa-circle-check',
                'color' => 'success'
            );
        }else{
            $data = array(
                'idArg' => $ProjId,
                'title' => 'Failed',
                'text' => 'unsuccessful',
                'icon' => 'fa-solid fa-triangle-exclamation',
                'color' => 'danger'
            );
        }
        return view('pages.payment_success')->with('dataArg', $data);
    }


    public function createPayment(Request $request)
    {
        if(!Auth::check()) return(abort(404));
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->DonationAmount,
                'currency' => env('PAYPAL_CURRENCY'),
                'description' => "Payment for Project: ".$request->ProjectId." From User: ".Auth::id(),
                'returnUrl' => url('payment/success/'.$request->ProjectId.'/'.Auth::id()),
                'cancelUrl' => url('payment/status/'.$request->ProjectId.'/error'),
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function paymentSuccess(Request $request, int $projectIdArg, int $userIdArg)
    {
        // dd("Project ID: ".$projectIdArg." User ID: ".$userIdArg);
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $dataVar = $response->getData();

                $paymentVar = new Payments;
                $paymentVar->proj_id = $projectIdArg;
                $paymentVar->user_id = $userIdArg;
                $paymentVar->payment_id = $dataVar['id'];
                $paymentVar->transaction_id = $dataVar['transactions'][0]['related_resources'][0]['sale']['id'];
                $paymentVar->amount = $dataVar['transactions'][0]['amount']['total'];
                $paymentVar->save();

                $this->_updateProjectStatAmount($projectIdArg, $paymentVar->amount);

                return(redirect('payment/status/'.$projectIdArg.'/success'));
            }
            else{
                return(redirect('payment/status/'.$projectIdArg.'/error'));
            }
        }
        else{
            return(redirect('payment/status/'.$projectIdArg.'/error'));
        }
    }


    public function ValidInput(Request $requestArg): void
    {
        $input = (float)$requestArg->DonationAmount;
        
        if ($input >= 100)
            $json_data = array("response" => "success");
        else
            $json_data = array("response" => "fail");
        echo json_encode($json_data);
    }


    private function _updateProjectStatAmount(int $projectIdArg, float $amountArg)
    {
        $statsVar = ProjectStats::where('proj_id', $projectIdArg)->first();

        $initialAmountVar = (float)$statsVar->donation_count;

        $statsVar->donation_count = $initialAmountVar + $amountArg;
        $statsVar->save();
    }


    public function getUserProjectPayments(int $projectIdArg)
    {
        $userPayments = Payments::where(['user_id' => Auth::id(), 'proj_id' => $projectIdArg])
        ->select('amount')->get()->toArray();

        if(count($userPayments) == 0) return(0.0);
        
        $totalPayments = 0.0;
        foreach($userPayments as $payment){
            $totalPayments += $payment['amount'];
        }

        return($totalPayments);
    }


    public function refund(float $amountArg, string $transactionIdArg)
    {
        if(!$this->_checkPaymentOwner($transactionIdArg)) return(dd('Error Not Owner of the payment or is already refunded'));
        $refundVar = $this->gateway->refund(array(
            'amount' => (string)$amountArg,
            'currency' => (string)env('PAYPAL_CURRENCY'),
        ));

        $refundVar->setTransactionReference($transactionIdArg);

        $responseVar = $refundVar->send();
        if($responseVar->isSuccessful()){
            $this->_setPaymentRefunded($transactionIdArg);
            dd("Payment Refunded");
        }
        else{
            dd("Something went wrong. Refund Unsuccessful");
        }
    }


    private function _setPaymentRefunded(string $transactionIdArg)
    {
        $paymentVar = Payments::where('transaction_id', $transactionIdArg)->first();

        $paymentVar->is_refunded = true;
        $paymentVar->save();
    }


    private function _checkPaymentOwner(string $transactionIdArg): bool
    {
        $paymentVar = Payments::where(['user_id' => Auth::id(), 'transaction_id' => $transactionIdArg, 'is_refunded' => false])->first();
        if(!($paymentVar)) return false;

        return true;
    }
}

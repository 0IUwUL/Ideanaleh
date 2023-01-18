<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luigel\Paymongo\Facades\Paymongo;
use App\Models\Payments;
use App\Http\Controllers\UserPreferenceController;

use Auth;

class PaymentsController extends Controller
{
    public function webhookPaymongo(): Object
    {
        return view('webhook.paymongo');
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


    public function createSource(Request $requestArg): void
    {
        if(Auth::check()){
            $input = (float)$requestArg->TierAmount;
        
            $sourceVar = Paymongo::source()->create([
                'type' => 'gcash',
                'amount' => $input,
                'currency' => 'PHP',
                'redirect' => [
                    'success' => (string)url('/payment/status/'.$requestArg->ProjectId.'/success'),
                    'failed' => (string)url('payment/status/'.$requestArg->ProjectId.'/failed')
                ],
                'metadata' => [
                    'project_id' => (string)$requestArg->ProjectId,
                    'user_id' => (string)Auth::id(),
                ]
            ]);
            // https://stackoverflow.com/a/71292930
            $encodeVar = json_encode((array)$sourceVar);
            $responseVar = json_decode(str_replace('\u0000*\u0000','',$encodeVar));
    
            $json_data = array(
                "response" => "success",
                'checkout_url' => $responseVar->attributes->redirect->checkout_url,
                'succes_url' => $responseVar->attributes->redirect->success,
                'failed_url' => $responseVar->attributes->redirect->failed,
                'project_id' => $responseVar->attributes->metadata->project_id,
                'user_id' => $responseVar->attributes->metadata->user_id,
                'data' => $responseVar,
            );
        }
        else{
            $json_data = array("response" => "error");
        }

        echo json_encode($json_data);
    }


    public function ValidInput(Request $requestArg): void
    {
        $input = (float)$requestArg->TierAmount;
        
        if ($input >= 100)
            $json_data = array("response" => "success");
        else
            $json_data = array("response" => "fail");
        echo json_encode($json_data);
    }

}

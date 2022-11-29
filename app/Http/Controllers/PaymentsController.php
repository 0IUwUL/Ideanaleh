<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luigel\Paymongo\Facades\Paymongo;
use App\Models\Payments;

use Auth;

class PaymentsController extends Controller
{
    public function webhookPaymongo(){
        return view('webhook.paymongo');
    }


    public static function savePayment(array $requestArg){
        $dataVar = new Payments;
        $dataVar->proj_id = $requestArg['data']['attributes']['data']['attributes']['metadata']['project_id'];
        $dataVar->user_id = $requestArg['data']['attributes']['data']['attributes']['metadata']['user_id'];
        $dataVar->payment_id = $requestArg['data']['attributes']['data']['id'];
        // note this value should be devided by 100 when you want to display it on the frontend -RamonDev
        $dataVar->amount = $requestArg['data']['attributes']['data']['attributes']['net_amount']/100;

        $dataVar->save();
    }

    public function createSource(Request $requestArg){
        $input = (float)$requestArg->TierAmount;
        
        $sourceVar = Paymongo::source()->create([
            'type' => 'gcash',
            'amount' => $input,
            'currency' => 'PHP',
            'redirect' => [
                'success' => (string)url('project/view/2'),
                'failed' => (string)url('project/view/'.$requestArg->ProjectId)
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


        echo json_encode($json_data);
    }

    public function ValidInput(Request $requestArg){
        $input = (float)$requestArg->TierAmount;
        
        if ($input >= 100)
            $json_data = array("response" => "success");
        else
            $json_data = array("response" => "fail");
        echo json_encode($json_data);
    }

}

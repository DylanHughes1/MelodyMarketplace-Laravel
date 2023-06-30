<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MercadoPago;

// require_once 'vendor/autoload.php';
class APIPurchaseController extends Controller
{

    public function makePurchase(Request $request)
    {


        // \MercadoPago\SDK::setAccessToken(env("VITE_ACCESS_TOKEN"));
        MercadoPago\SDK::setAccessToken("TEST-8154182059068188-062013-688347d68cda673bb7b097a204801577-393519241");

        $contents = $request->json()->all();

        $payment = new MercadoPago\Payment();
        $payment->transaction_amount = $contents['transaction_amount'];
        $payment->token = $contents['token'];
        $payment->installments = $contents['installments'];
        $payment->payment_method_id = $contents['payment_method_id'];
        $payment->issuer_id = $contents['issuer_id'];

        $payer = new MercadoPago\Payer();
        $payer->email = $contents['payer']['email'];
        $payer->identification = array(
            "type" => $contents['payer']['identification']['type'],
            "number" => $contents['payer']['identification']['number']
        );

        $payment->payer = $payer;
        $payment->save();
        $response = array(
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        );

        return response()->json($response);
    }
}

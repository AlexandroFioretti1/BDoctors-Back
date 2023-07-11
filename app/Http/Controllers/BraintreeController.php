<?php

namespace App\Http\Controllers;

use Braintree\Gateway;
use Braintree\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BraintreeController extends Controller
{

    public function checkout()
    {
        $gateway = new Gateway([
            "environment" => env("BRAINTREE_ENVIRONMENT"),
            "merchantId" => env("BRAINTREE_MERCHANT_ID"),
            "publicKey" => env("BRAINTREE_PUBLIC_KEY"),
            "privateKey" => env("BRAINTREE_PRIVATE_KEY"),
        ]);


        $token = $gateway->ClientToken()->generate();

        return view('doctor.checkout', compact('token'));
    }

    public function processPayment(Request $request)
    {

        $gateway = new Gateway([
            "environment" => env("BRAINTREE_ENVIRONMENT"),
            "merchantId" => env("BRAINTREE_MERCHANT_ID"),
            "publicKey" => env("BRAINTREE_PUBLIC_KEY"),
            "privateKey" => env("BRAINTREE_PRIVATE_KEY"),
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => 'fake-valid-visa-nonce',
            // 'deviceData' => $deviceDataFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($result->success) {
            return Redirect::back()->with('success', 'Payment successfully');
        } else {
            return Redirect::back()->with('error', 'Error during payment');
        }
    }
}

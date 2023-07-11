<?php

namespace App\Http\Controllers;

use Braintree\Gateway;
use Braintree\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{

    public function checkout()
    {

        // take profile data
        // $user = Auth::user();
        // $profile = $user->profile;
        // $profileId = $profile->id;

        // take data from request
        // $price = $request->sponsor_price;
        // $sponsor_id = $request->sponsor_id;
        // $duration = $request->sponsor_duration;

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $clientToken = $gateway->ClientToken()->generate();
        // take the id of the plan 
        return view('doctor.checkout', compact('clientToken'));
    }
    public function processPayment(Request $request)
    {

        // take profile data
        $user = Auth::user();
        $profile = $user->profile;
        $profileId = $profile->id;


        // take data from request
        $price = $request->sponsor_price;
        $sponsor_id = $request->sponsor_id;
        // $duration = $request->sponsor_duration;


        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $price,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($result->success) {
            $profile->sponsors()->attach($sponsor_id);
            return Redirect::back()->with('success', 'Payment successfully');
        } else {
            return Redirect::back()->with('error', 'Error during payment');
        }
    }
}

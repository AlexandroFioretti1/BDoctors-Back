<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Braintree\Gateway;
use Carbon\Carbon;
use Braintree\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{

    public function checkout($id)
    {


        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $clientToken = $gateway->ClientToken()->generate();
        $sponsorPlan = Sponsor::where('id', $id)->first();
        return view('doctor.checkout', compact('clientToken', 'sponsorPlan'));
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
        $duration = $request->sponsor_duration;
        $payment_method_nonce = $request->payment_method_nonce;


        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);


        $result = $gateway->transaction()->sale([
            'amount' => $price,
            'paymentMethodNonce' => 'fake-valid-visa-nonce',
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($result->success) {

            // set start and end time
            $now = Carbon::now()->addHours(2);
            $startTime = $now->toDateTimeString();
            $endTime = $now->addHours($duration)->toDateTimeString();

            $profile->sponsors()->attach($sponsor_id, [
                'start_time' => $startTime,
                'end_time' => $endTime,

            ]);
            return Redirect::back()->with('success', 'Payment successfully');
        } else {
            return Redirect::back()->with('error', 'Error during payment');
        }
    }
}
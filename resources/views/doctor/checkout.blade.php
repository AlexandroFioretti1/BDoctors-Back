@extends('layouts.app')

@section('content')
    <script src="https://js.braintreegateway.com/web/dropin/1.38.1/js/dropin.js"></script>
    <script src="{{ asset('js/payment.js') }}"></script>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('payment.process') }}" method="post">
            @csrf

            <input type="hidden" id="nonce" name="payment_method_nonce" />
            <input type="hidden" name="sponsor_id" value="{{ $sponsorPlan->id }}">
            <input type="hidden" name="sponsor_price" value="{{ $sponsorPlan->price }}">
            <input type="hidden" name="sponsor_duration" value="{{ $sponsorPlan->duration }}">
            <input type="hidden" name="sponsor_name" value="{{ $sponsorPlan->name }}">

            <div id="dropin-container">
            </div>
            <button id="submit-button" class="button button--small button--green">Purchase</button>
        </form>
    </div>
@endsection

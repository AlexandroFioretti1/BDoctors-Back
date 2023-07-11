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
            <div class="alert alert-success">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('payment.process') }}" method="post">
            @csrf
            <div id="dropin-container">
            </div>
            <input type="hidden" name="payment_method_nonce">
            <button id="submit-button" class="button button--small button--green">Purchase</button>
        </form>
    </div>
@endsection

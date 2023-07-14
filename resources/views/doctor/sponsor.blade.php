@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center fw-semibold fs-5 inline-block mt-5 text-uppercase"> Sponsor Packages</h2>
        <h6 class="text-center fw-semibold inline-block text-uppercase"> Give your profile a boost with our sponsorship
            packages</h6>
        <div class="row row-cols-1 row-cols-lg-3 my-4">
            @foreach ($sponsors as $sponsor)
                <div class="col">
                    <div class="card text-center sponsor_card shadow border-2 mb-4">
                        <div class="card-body">
                            {{-- Add 'id' as second param  --}}
                            <form action="{{ route('checkout', ['id' => $sponsor->id]) }}" method="get">
                                @csrf
                                <input type="hidden" id="payment-method-nonce" name="payment_method_nonce">
                                {{-- send data to controller --}}
                                {{-- <input type="hidden" name="sponsor_id" value="{{ $sponsor->id }}">
                                <input type="hidden" name="sponsor_price" value="{{ $sponsor->price }}">
                                <input type="hidden" name="sponsor_duration" value="{{ $sponsor->duration }}">
                                <input type="hidden" name="sponsor_name" value="{{ $sponsor->name }}"> --}}

                                <h4 class="card-title">{{ $sponsor->name }}</h4>
                                <p class="card-text">{{ $sponsor->duration }} h</p>
                                <p class="card-text"> € {{ $sponsor->price }}</p>
                                <button type="submit" class="btn btn-warning get_sponsor" role="button">Get</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <p class="text-center bg-white rounded p-2">For every selected package, your profile will be showcased among
            featured
            doctors on our
            homepage and appear at the top of search results in advanced searches. Supercharge your profile visibility and
            reach a wider audience!</p>
    </div>
@endsection

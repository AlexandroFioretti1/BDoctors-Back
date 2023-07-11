@extends('layouts.app')

@section('content')
    <div class="container">
        <h2> Sponsor Packages</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            @foreach ($sponsors as $sponsor)
                <div class="col">
                    <div class="card text-center sponsor_card shadow border-2">
                        <div class="card-body">
                            <h4 class="card-title">{{ $sponsor->name }}</h4>
                            <p class="card-text">{{ $sponsor->duration }} h</p>
                            <p class="card-text"> € {{ $sponsor->price }}</p>
                            <a class="btn btn-warning" href="{{ route('checkout') }}" role="button">Get</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2> Sponsor Packages</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            @foreach ($sponsors as $sponsor)
                <div class="col">
                    <div class="card text-center sponsor_card shadow border-2">
                        <div class="card-body">
                            {{-- Add 'id' as second param  --}}
                            <form action="{{ route('checkout') }}" method="get">
                                @csrf

                                {{-- send data to controller --}}
                                <input type="hidden" name="sponsor_id" value="{{ $sponsor->id }}">
                                <input type="hidden" name="sponsor_price" value="{{ $sponsor->price }}">
                                <input type="hidden" name="sponsor_duration" value="{{ $sponsor->duration }}">
                                <input type="hidden" name="sponsor_name" value="{{ $sponsor->name }}">

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
    </div>
@endsection)

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-8 shadow-lg rounded-5 mt-5">
            <h2 class="fs-4 text-secondary my-4 p-5">
                Your reviews
            </h2>

            @foreach ($reviews as $review)
            <div class="col px-5 py-2">
                <div class="card">
                    <div class="card-header">
                        <p>{{$review->name}} {{$review->surname}}</p>
                        <small>{{$review->date}}</small>
                    </div>
                    <div class="card-body">
                        <p>{{$review->text}} </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
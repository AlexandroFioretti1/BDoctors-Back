@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center gap-4">
            <div class="col-5 shadow-lg rounded-5 mt-5 bg-white ">
                <h2 class="fs-4 text-secondary my-4 p-5 text-center fw-semibold fs-5 inline-block  text-uppercase">
                    Your Votes
                </h2>

                <div class=" bg_secondary rounded text-white mt-4 mt-lg-0">
                    <div class="shadow p-4 rounded-4">
                        <div class="wrapper">
                            <ul class="list-unstyled">
                                <li class="average text-center">
                                    Your average vote is: <strong>{{ $profile->average_vote }}</strong>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <div>⭐</div>
                                    <div>{{ $votes->where('vote', 1)->count() }}</div>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <div>⭐⭐</div>
                                    <div>{{ $votes->where('vote', 2)->count() }}</div>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <div>⭐⭐⭐</div>
                                    <div>{{ $votes->where('vote', 3)->count() }}</div>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <div>⭐⭐⭐⭐</div>
                                    <div>{{ $votes->where('vote', 4)->count() }}</div>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <div>⭐⭐⭐⭐⭐</div>
                                    <div>{{ $votes->where('vote', 5)->count() }}</div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5 shadow-lg rounded-5 mt-5 bg-white">
                <h2 class="fs-4 text-secondary my-4 p-5 text-center fw-semibold fs-5 inline-block  text-uppercase">
                    Your reviews
                </h2>
                <div class="back_card mb-5">
                    @foreach ($reviews as $review)
                        <div class="col px-5 py-2">
                            <div class="card">
                                <div class="card-header">
                                    <p>{{ $review->name }} {{ $review->surname }}</p>
                                    <small>{{ $review->date }}</small>
                                </div>
                                <div class="card-body">
                                    <p>{{ $review->text }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

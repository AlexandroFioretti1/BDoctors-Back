@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-8 shadow-lg rounded-5 mt-5">
            <h2 class="fs-4 text-secondary my-4 p-5">
                Your Messages
            </h2>

            @foreach ($messages as $message)
            <div class="col px-5 py-2">
                <div class="card">
                    <div class="card-header">
                        <p>{{$message->user_name_surname}}</p>
                        <small>{{$message->date}}</small>
                    </div>
                    <div class="card-body">
                        <p>{{$message->text}} </p>
                        <p>Answer at: <strong>{{$message->email}}</strong></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
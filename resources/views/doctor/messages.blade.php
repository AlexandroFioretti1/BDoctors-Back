@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8 shadow-lg rounded-5 mt-5">
                <h2 class="fs-4 text-secondary my-4 p-5 text-center fw-semibold fs-5 inline-block  text-uppercase">
                    Your Messages
                </h2>

                @foreach ($messages as $message)
                    <div class="col px-5 py-2">
                        <div class="card">
                            <div class="card-header">
                                @if (!$message->read)
                                    <span class="bg-warning">New Messages</span>
                                @endif
                                <p>{{ $message->user_name_surname }}</p>
                                <small>{{ $message->date }}</small><br>

                                <button id="{{ $message->id }}"
                                    class="btn btn-primary px-3 py-1 read border-0 text-white cursor-pointer inline-block position-relative text-decoration-none user-select-none rounded-5 fs-5 fw-semibold text-center select-none blue-btn"
                                    role="button" data-message-id="{{ $message->id }}">
                                    Read
                                </button>

                            </div>
                            <div class="card-body d-none">
                                <p>{{ $message->text }} </p>
                                <p>Answer at: <strong>{{ $message->email }}</strong></p>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="{{ asset('js/readMessage.js') }}"></script>
@endsection

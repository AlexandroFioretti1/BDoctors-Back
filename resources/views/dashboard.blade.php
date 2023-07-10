@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8 shadow-lg rounded-5 mt-5">
                <h2 class="fs-4 text-secondary my-4 p-5">
                    {{ __('Dashboard') }}
                </h2>


                <div class="d-flex">
                    <div class="col d-flex justify-content-center my-3">
                        <a name="" id="" class="btn btn-primary" href="{{ route('profiles.index') }}"
                            role="button">Profile Doctor</a>
                    </div>

                    <div class="col d-flex justify-content-center my-3 ">
                        <a name="" id="" class="btn btn-primary" href="{{ route('messages') }}"
                            role="button">Your Messages</a>
                        {{-- <span class="bg-danger">{{ $unreadMessages->count() }}</span> --}}
                    </div>

                    <div class="col d-flex justify-content-center my-3 ">
                        <a name="" id="" class="btn btn-primary" href="{{ route('reviews') }}"
                            role="button">Your Rewievs</a>
                    </div>
                </div>

                <div class="col px-5 py-2">
                    <div class="card">
                        <div class="card-header">{{ __('User Dashboard') }}</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

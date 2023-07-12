@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row d-flex justify-content-center ">
            <div class="col-8 shadow-lg rounded-5 mt-5">
                <div class="card-header fs-4 text-secondary my-5 text-start p-5"><b> {{ __('Reset Password') }} </b> </div>
                <div class="">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="p-5" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right ">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary border-0 text-white cursor-pointer inline-block position-relative text-decoration-none user-select-none rounded-5 fs-5 fw-semibold text-center select-none blue-btn">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

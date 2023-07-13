@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="wrapper fadeInDown d-flex align-items-center flex-column justify-center w-100 ">
                    <div id="formContent" class="col-8 shadow-lg rounded-5 mt-3">
                        <!-- Tabs Titles -->
                        <h2 class="active text-center fw-semibold fs-5 inline-block m-2 text-uppercase"> Sign In </h2>
                        {{-- <h2 class="inactive underlineHover text-center fw-semibold fs-5 inline-block m-2 text-uppercase">Sign Up </h2> --}}

                        <!-- Icon -->
                        <div class="fadeIn first">
                            <img class="w-50" src="{{ asset('img/bdoctor__2_-removebg-preview.png') }}" id="icon"
                                alt="User Icon" />
                        </div>

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email"
                                required autofocus>
                            <input type="password" id="password" class="fadeIn third" name="password"
                                placeholder="Password" required>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group d-flex justify-content-center">
                                        <div class="form-check align-self-center">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                        </div>
                                        <label class="form-check-label col-form-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col p-2">
                                    <button type="submit"
                                        class="btn btn-primary blue-btn border-0 text-white cursor-pointer inline-block position-relative text-decoration-none user-select-none rounded-5 fs-5 fw-semibold text-center select-none ">
                                        {{ __('Login') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                        <!-- Remind Passowrd -->
                        <div class="underlineHover" href="#" id="formFooter">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link inline-block text-decoration-none fw-normal"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

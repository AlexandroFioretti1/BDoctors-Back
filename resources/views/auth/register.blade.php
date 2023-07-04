@extends('layouts.app')

@section('content')
    <div class="container mt-4 ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper fadeInDown">
                    <div id="formContent">
                        <!-- Tabs Titles -->
                        <h2 class="inactive underlineHover">Sign Up </h2>

                        <!-- Icon -->
                        <div class="fadeIn first">
                            <img class="w-25"
                                src="data:image/png;base64,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"
                                id="icon" alt="User Icon" />
                        </div>

                        <!-- Registration Form -->
                        <form id="my-form-register" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4 row">
                                <div class="alert alert-danger d-none" id="nameError" role="alert">
                                    <strong>Alert: </strong>Name must be less than 50 characters
                                </div>
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="alert alert-danger d-none" id="surnameError" role="alert">
                                    <strong>Alert: </strong>Surname must be less than 50 characters
                                </div>
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="alert alert-danger d-none" id="addressError" role="alert">
                                    <strong>Alert: </strong>Address must be less than 255 characters
                                </div>
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="alert alert-danger d-none" id="emailError" role="alert">
                                    <strong>Alert: </strong>This in not a valid mail
                                </div>
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="alert alert-danger d-none" id="passwordError" role="alert">
                                    <strong>Alert: </strong>Passwords don't match
                                </div>
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Remind Password -->
                        <div id="formFooter">
                            <a class="underlineHover" href="#">Forgot Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/checkErrorRegister.js') }}"></script>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-4 ">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="wrapper fadeInDown d-flex align-items-center flex-column justify-center w-100 ">
                    <div id="formContent" class="col-8 shadow-lg rounded-5 mt-3">
                        <!-- Tabs Titles -->
                        <h2 class="inactive underlineHover text-center fw-semibold fs-5 inline-block m-2 text-uppercase">Sign
                            Up</h2>

                        <!-- Icon -->
                        <div class="fadeIn first">
                            <img class="w-25" src="{{ asset('img/bdoctor__2_-removebg-preview.png') }}" alt="User Icon" />
                        </div>

                        <!-- Registration Form -->
                        <form id="my-form-register" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4 row">
                                <div class="alert alert-danger d-none" id="nameError" role="alert">
                                    <strong>Alert: </strong>Name must be less than 50 characters
                                </div>
                                <div class="alert alert-danger d-none" id="nameErrorRequired" role="alert">
                                    <strong>Alert: </strong>This field is required
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
                                <div class="alert alert-danger d-none" id="surnameErrorRequired" role="alert">
                                    <strong>Alert: </strong>This field is required
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
                                <div class="alert alert-danger d-none" id="addressErrorRequired" role="alert">
                                    <strong>Alert: </strong>This field is required
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
                                <div class="alert alert-danger d-none" id="emailErrorRequired" role="alert">
                                    <strong>Alert: </strong>This field is required
                                </div>
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6 d-flex justify-content-center">
                                    <input id="email" type="email"
                                        class="form-control w-75  @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <div class="alert alert-danger d-none" id="passwordErrorRequired" role="alert">
                                    <strong>Alert: </strong>This field is required
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
                                    <button type="submit"
                                        class="btn btn-primary border-0 text-white cursor-pointer inline-block position-relative text-decoration-none user-select-none rounded-5 fs-5 fw-semibold text-center select-none blue-btn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>


                        <!-- Remind Password -->
                        <div id="formFooter">
                            <a class="underlineHover inline-block text-decoration-none fw-normal" href="#">Forgot
                                Password?</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/checkErrorRegister.js') }}"></script>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center ">
            <div class="col-8 ">
                <h2 class="fs-4 text-secondary my-4 text-start ">
                    {{ __('Profile') }}
                </h2>

            </div>
            <div class="col-8 ">
                <div class="shadow-lg rounded-5 p-4 mb-4 bg-white ">

                    @include('profile.partials.update-profile-information-form')

                </div>

                <div class="shadow-lg rounded-5 p-4 mb-4 bg-white ">


                    @include('profile.partials.update-password-form')

                </div>

                <div class="shadow-lg rounded-5 p-4 mb-4 bg-white ">


                    @include('profile.partials.delete-user-form')

                </div>

            </div>
        </div>
    </div>
@endsection

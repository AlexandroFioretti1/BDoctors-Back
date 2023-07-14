@extends('layouts.app')

@section('content')

@if ($profile)
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-8 shadow-lg rounded-5 mt-5">
            <div class="d-flex justify-content-center p-3">
                
                <a class="btn btn-warning  inline-block text-decoration-none fw-normal border-0 text-white cursor-pointer inline-block position-relative text-decoration-none user-select-none rounded-5 fs-5 fw-semibold text-center select-none blue-btn"
                    href="{{ route('sponsors') }}" role="button">Sponsor Your Profile</a>
            </div>
        </div>
    </div>
</div>
@endif

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8 shadow-lg rounded-5 mt-5 ">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2
                            class="fs-4 text-secondary my-4 p-5 text-center fw-semibold fs-5 inline-block m-2 text-uppercase">
                            {{ __('Dashboard') }}
                        </h2>
                    </div>
                   

                </div>


                <div class="d-flex flex-column flex-lg-row">
                    <div class="col d-flex justify-content-center my-3">
                        @if (!$profile)
                            <a name="" id=""
                                class="btn btn-warning  inline-block text-decoration-none fw-normal border-0 text-white cursor-pointer inline-block position-relative text-decoration-none user-select-none rounded-5 fs-5 fw-semibold text-center select-none blue-btn"
                                href="{{ route('profiles.create') }}" role="button">Create your Profile</a>
                        @else
                            <a name="" id=""
                                class="btn btn-primary  inline-block text-decoration-none fw-normal border-0 text-white cursor-pointer inline-block position-relative text-decoration-none user-select-none rounded-5 fs-5 fw-semibold text-center select-none blue-btn"
                                href="{{ route('profiles.index') }}" role="button"> My Profile</a>
                        @endif


                    </div>

                    <div class="col d-flex justify-content-center my-3 ">
                        <a name="" id=""
                            class="btn btn-primary  inline-block text-decoration-none fw-normal border-0 text-white cursor-pointer inline-block position-relative text-decoration-none user-select-none rounded-5 fs-5 fw-semibold text-center select-none blue-btn"
                            href="{{ route('messages.index') }}" role="button">My Messages</a>
                        {{-- <span class="bg-danger">{{ $unreadMessages->count() }}</span> --}}
                    </div>

                    <div class="col d-flex justify-content-center my-3 ">
                        <a name="" id=""
                            class="btn btn-primary  inline-block text-decoration-none fw-normals border-0 text-white cursor-pointer inline-block position-relative text-decoration-none user-select-none rounded-5 fs-5 fw-semibold text-center select-none blue-btn"
                            href="{{ route('reviews') }}" role="button">My Rewievs</a>
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

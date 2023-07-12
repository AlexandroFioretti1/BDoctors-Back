@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center pb-5">
            <div class="col-8 rounded-5 mt-5 bg-light shadow-lg ">
                <form id="my-form" action="{{ route('profiles.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h1 class="fs-4 text-secondary my-4 mt-5"><b>Create Profile</b> </h1>
                    <div class="mb-5">
                        <div class="alert alert-danger d-none" id="phoneNumberError" role="alert">
                            <strong>Alert: </strong>Phone number must include between 9 and 16 digits
                        </div>
                        <label for="phone_number" class="form-label mt-5"><b>Phone Number</b> </label>
                        <input type="number" name="phone_number" id="phone_number"
                            class="form-control @error('phone_number') is-invalid @enderror" placeholder="Add Phone Number"
                            aria-describedby="helpPhone_number" value="{{ old('phone_number') }}">
                        <small id="helpPhone_number" class="text-muted">Insert Phone Number</small>
                    </div>

                    @error('phone_number')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error:</strong> {{ $message }}
                        </div>
                    @enderror
                    {{-- form phone_number --}}
                    <div class="mb-5">
                        <div class="alert alert-danger d-none" id="addressError" role="alert">
                            <strong>Alert: </strong>Address must be less than 255 characters
                        </div>
                        <label for="address" class="form-label w-100"><b>Address</b></label>
                        <input type="text" name="address" id="address"
                            class="form-control w-100 @error('address') is-invalid @enderror" placeholder="Add address"
                            aria-describedby="helpAddress" value="{{ old('address') }}">
                        <small id="helpAddress" class="text-muted w-100">
                            <p></p>Insert your office's Address
                        </small>
                    </div>

                    @error('address')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error:</strong> {{ $message }}
                        </div>
                    @enderror
                    {{-- form address --}}
                    <div class="mb-5">
                        <label for="doctor_image" class="form-label"><b> Doctor Image</b></label>
                        <input type="file" name="doctor_image" id="doctor_image"
                            class="form-control @error('doctor_image') is-invalid @enderror">
                        <small id="helpDoctor_image" class="text-muted">Add a Photo</small>
                    </div>
                    @error('doctor_image')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error:</strong> {{ $message }}
                        </div>
                    @enderror
                    {{-- form doctor_image --}}
                    <div class="mb-5">
                        <label for="cv" class="form-label"><b>CV</b></label>
                        <input type="file" name="cv" id="cv"
                            class="form-control @error('cv') is-invalid @enderror">
                        <small id="helpCv" class="text-muted">Add Curriculum Vitae</small>
                    </div>
                    @error('cv')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error:</strong> {{ $message }}
                        </div>
                    @enderror
                    {{-- form cv --}}
                    <div class="mb-5">
                        <label for="performances" class="form-label"><b>Performances</b> </label>
                        <textarea class="form-control @error('performances') is-invalid @enderror" name="performances" id="performances"
                            aria-describedby="helpPerformances" rows="3"></textarea>
                        <small id="helpPerformances" class="text-muted">Insert a performances</small>
                    </div>
                    @error('performances')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error:</strong> {{ $message }}
                        </div>
                    @enderror
                    {{-- form performances --}}
                    <div class="form-group">
                        <div class="alert alert-danger d-none" id="specializationError" role="alert">
                            <strong>Alert: </strong>You must select at least one specialization
                        </div>
                        <p><b> Select your specializations</b></p>
                        @foreach ($specializations as $specialization)
                            <div class="form-check @error('specializations') is-invalid @enderror">
                                <label class="form-check-label">
                                    <input name="specializations[]" type="checkbox" value="{{ $specialization->id }}"
                                        class="form-check-input shadow-lg "
                                        {{ in_array($specialization->id, old('specializations', [])) ? 'checked' : '' }}>
                                    {{ $specialization->name }}
                                </label>
                            </div>
                        @endforeach

                        @error('specializations')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-4 py-2 px-4 my-5 border-0 text-white cursor-pointer inline-block position-relative text-decoration-none user-select-none rounded-5 fs-5 fw-semibold text-center select-none blue-btn">Create Profile</button>
                    {{-- /submit create profile --}}
                </form>
                {{-- /form --}}

            </div>
        </div>
    </div>
    <script src="{{ asset('js/checkError.js') }}"></script>
@endsection

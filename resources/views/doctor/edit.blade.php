@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row d-flex justify-content-center ">
            <div class="col-8 shadow-lg rounded-5 mt-3 bg-light">
                <h1 class="fs-4 text-secondary my-5 text-start"><b>Edit Your Profile</b></h1>

                <div class="mb-5">
                    <label for="name" class="form-label w-100 d-inline-block"><b> Name</b> </label>
                    <input id="surname" class="form-control w-100 d-inline-block" type="text"
                        value="{{ $profile->user->name }}" disabled>
                    <small class="text-muted w-100 d-inline-block">You can't change this field here</small>
                </div>
                <div class="mb-5">
                    <label for="surname" class="form-label w-100 d-inline-block"><b>Surname</b> </label>
                    <input id="surname" class="form-control w-100 d-inline-block" type="text"
                        value="{{ $profile->user->surname }}" disabled>
                    <small class="text-muted w-100 d-inline-block">You can't change this field here</small>
                </div>
                <form id="my-form" action="{{ route('profiles.update', $profile) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <div class="alert alert-danger d-none" id="phoneNumberError" role="alert">
                            <strong>Alert:</strong> Phone number must include between 9 and 16 digits
                        </div>
                        <label for="phone_number" class="form-label w-100 d-inline-block"><b>Phone Number</b> </label>
                        <input type="number" name="phone_number" id="phone_number"
                            class="form-control @error('phone_number') is-invalid @enderror w-100 d-inline-block"
                            placeholder="Add Phone Number" aria-describedby="helpPhone_number"
                            value="{{ old('phone_number', $profile->phone_number) }}">
                        <small id="helpPhone_number" class="text-muted w-100 d-inline-block">Insert Phone Number</small>
                    </div>

                    @error('phone_number')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error:</strong> {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-5">
                        <div class="alert alert-danger d-none" id="addressError" role="alert">
                            <strong>Alert:</strong> Address must be less than 255 characters
                        </div>
                        <label for="address" class="form-label w-100 d-inline-block"><b>Address</b> </label>
                        <input type="text" name="address" id="address"
                            class="form-control @error('address') is-invalid @enderror w-100 d-inline-block"
                            placeholder="Add address" aria-describedby="helpAddress"
                            value="{{ old('address', $profile->address) }}">
                        <small id="helpAddress" class="text-muted w-100 d-inline-block">Insert your office's Address</small>
                    </div>

                    @error('address')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error:</strong> {{ $message }}
                        </div>
                    @enderror
                    {{-- form address --}}
                    <div class=" mb-5 ">
                        <label for="doctor_image" class="form-label"><b>Doctor Image</b> </label>
                        <div>
                            <img height="100" src="{{ asset('storage/' . $profile->doctor_image) }}" class="rounded mb-2">
                            <input type="file" name="doctor_image" id="doctor_image"
                                class="form-control @error('doctor_image') is-invalid @enderror">
                            <small id="helpDoctor_image" class="text-muted">Add a Photo</small>
                        </div>
                    </div>

                    @error('doctor_image')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error:</strong> {{ $message }}
                        </div>
                    @enderror
                    {{-- form doctor_image --}}
                    <div class="mb-5">
                        <label for="cv" class="form-label"><b>CV</b></label>
                        <div>
                            <img height="100" src="{{ asset('storage/' . $profile->cv) }}" class="rounded mb-2">
                            <input type="file" name="cv" id="cv"
                                class="form-control @error('cv') is-invalid @enderror">
                            <small id="helpCv" class="text-muted">Add Curriculum Vitae</small>
                        </div>
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
                            aria-describedby="helpPerformances" rows="3"> {{ old('performances', $profile->performances) }}</textarea>
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
                                    @if ($errors->any())
                                        <input name="specializations[]" type="checkbox"
                                            value="{{ $specialization->id }}" class="form-check-input shadow-lg"
                                            {{ in_array($specialization->id, old('specializations', [])) ? 'checked' : '' }}>
                                    @else
                                        <input name='specializations[]' type='checkbox'
                                            value='{{ $specialization->id }}' class='form-check-input'
                                            {{ $profile->specializations->contains($specialization) ? 'checked' : '' }}>
                                    @endif
                                    {{ $specialization->name }}
                                </label>
                            </div>
                        @endforeach

                        @error('specializations')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-4 py-2 px-4 my-5">Edit Profile</button>
                    {{-- /submit create profile --}}

                </form>
                {{-- /form --}}

            </div>
        </div>
    </div>
    <script src="{{ asset('js/checkError.js') }}"></script>
@endsection

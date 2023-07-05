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
                            <img height="100" src="data:image/png;base64,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" class="rounded mb-2">
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

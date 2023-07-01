@extends('layouts.app')


@section('content')
    <div class="container">

        <form action="{{ route('profiles.update', $profile) }}" method="post">
            @csrf

            @method('PUT')

            <h1 class="fs-4 text-secondary my-4">Create Profile</h1>

            <div class="mb-5">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="number" name="phone_number" id="phone_number"
                    class="form-control @error('phone_number') is-invalid @enderror" placeholder="Add Phone Number"
                    aria-describedby="helpPhone_number" value="{{ old('phone_number', $profile->phone_number) }}">
                <small id="helpPhone_number" class="text-muted">Insert Phone Number</small>
            </div>

            @error('phone_number')
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> {{ $message }}
                </div>
            @enderror
            {{-- form phone_number --}}

            <div class="mb-5">
                <label for="address" class="form-label">address</label>
                <input type="text" name="address" id="address"
                    class="form-control @error('address') is-invalid @enderror" placeholder="Add address"
                    aria-describedby="helpAddress" value="{{ old('address', $profile->address) }}">
                <small id="helpAddress" class="text-muted">Insert your office's Address</small>
            </div>

            @error('address')
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> {{ $message }}
                </div>
            @enderror
            {{-- form address --}}

            <div class="mb-5">
                <label for="doctor_image" class="form-label">Doctor Image</label>
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
                <label for="cv" class="form-label">cv</label>
                <input type="file" name="cv" id="cv" class="form-control @error('cv') is-invalid @enderror">
                <small id="helpCv" class="text-muted">Add Curriculum Vitae</small>
            </div>

            @error('cv')
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> {{ $message }}
                </div>
            @enderror
            {{-- form cv --}}

            <div class="mb-5">
                <label for="performances" class="form-label">Performances</label>
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
                <p>Select your specializations</p>
                @foreach ($specializations as $specialization)
                    <div class="form-check @error('specializations') is-invalid @enderror">

                        <label class="form-check-label">
                            @if ($errors->any())
                                <input name="specializations[]" type="checkbox" value="{{ $specialization->id }}"
                                    class="form-check-input"
                                    {{ in_array($specialization->id, old('specializations', [])) ? 'checked' : '' }}>
                            @else
                                <input name='specializations[]' type='checkbox' value='{{ $specialization->id }}'
                                    class='form-check-input'
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


            <button type="submit" class="btn btn-primary w-100 mt-4 py-2 px-4">Edit Profile</button>
            {{-- /submit create profile --}}

        </form>
        {{-- /form --}}
    </div>
@endsection

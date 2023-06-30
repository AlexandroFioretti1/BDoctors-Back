@extends('layouts.app')


@section('content')
    <a class="btn btn-primary" href="{{ route('profiles.create') }}" role="button">Button</a>

    @if ($profile)
        <div class="container">
            <div class="card">
                <img class="card-img-top" src="holder.js/100x180/" alt="img">
                <div class="card-body">
                    <h4 class="card-title">{{ $profile->user->name }} {{ $profile->user?->surname }} </h4>
                    <p class="card-text">{{ $profile->address }}</p>
                </div>
                <div class="d-flex">
                    <div class="row gap-2">
                        <div>
                            <a class="btn btn-primary" href="#" role="button">Edit</a>
                        </div>
                        <div>
                            <a class="btn btn-danger" href="#" role="button" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $profile->id }}">Delete</a>
                        </div>
                    </div>

                    {{-- Modal --}}
                    <div class="modal fade" id="deleteModal-{{ $profile->id }}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">Delete profile</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this profile
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <form action="{{ route('profiles.destroy', $profile->slug) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif
@endsection

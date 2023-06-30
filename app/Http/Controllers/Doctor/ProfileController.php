<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Profile;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $profile = $user->profile;

        return view('doctor.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $profile = $user->profile;

        //check if profile already exist
        if ($profile) {
            return to_route('profiles.index')->with('message', 'Profile already exist');
        }

        //take specializations from db
        $specializations = Specialization::all();

        return view('doctor.create', compact('specializations', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        $user = Auth::user();

        //dd($user->id);

        $val_data =  $request->validated();

        //controllare ci siano solo numeri in phone_number*


        $profile = $user->profile;

        //check if profile already exist
        if ($profile) {
            return to_route('profiles.index')->with('message', 'Profile already exist');
        }

        $name = $user->name;
        $surname = $user->surname;

        $slug = Profile::generateSlug($name, $surname);
        $val_data['slug'] = $slug;

        $val_data['user_id'] = $user->id;

        $new_profile = Profile::create($val_data);

        //dd($new_profile);

        //attach the specializations
        if ($request->has('specializations')) {
            $new_profile->specializations()->attach($request->specializations);
        }

        return to_route('profiles.index')->with('message', 'Profile created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $user = Auth::user();
        $profile = $user->profile;

        //take specializations from db
        $specializations = Specialization::all();

        return view('doctor.edit', compact('specializations', 'user', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $user = Auth::user();

        //dd($user->id);

        $val_data =  $request->validated();

        //controllare ci siano solo numeri in phone_number*


        $profile = $user->profile;

        //check if profile already exist
        if ($profile) {
            return to_route('profiles.index')->with('message', 'Profile already exist');
        }

        $name = $user->name;
        $surname = $user->surname;

        $slug = Profile::generateSlug($name, $surname);
        $val_data['slug'] = $slug;

        $val_data['user_id'] = $user->id;

        $profile->update($val_data);

        //dd($new_profile);

        //attach the specializations
        if ($request->has('specializations')) {
            $profile->specializations()->sync($request->specializations);
        }

        return to_route('profiles.index')->with('message', 'Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return to_route('profiles.index')->with('message', 'Profile deleted successfully');
    }
}

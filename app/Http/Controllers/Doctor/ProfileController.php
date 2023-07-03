<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Profile;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get data by current user
        $user = Auth::user();

        // set $profile equivalent  into user -> profile
        $profile = $user->profile;

        // move user to index page share $profile
        return view('doctor.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get data by current user
        $user = Auth::user();

        // set $profile equivalent  into user -> profile
        $profile = $user->profile;

        //check if profile already exist
        if ($profile) {

            // if user have just a profile  redirect to page index with error message
            return to_route('profiles.index')->with('message', 'Profile already exist');
        }

        //take specializations from db
        $specializations = Specialization::all();

        // move user to create page share $specializations (because the specializations are on another table ), $user(because...)
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

        // get data by current user
        $user = Auth::user();


        //dd($user->id);


        
        // get validate data from form
        $val_data =  $request->validated();


        // set $profile equivalent  into user -> profile
        $profile = $user->profile;

        //check if profile already exist
        if ($profile) {

            // if user have just a profile  redirect to page index with error message
            return to_route('profiles.index')->with('message', 'Profile already exist');
        }

        //---------------SLUG---------------------------------


        // get user name and set into $name
        $name = $user->name;

        // get user surname and set into $surname
        $surname = $user->surname;

        //  use function 'generationSlug' for create slug whit ($name $surname)
        $slug = Profile::generateSlug($name, $surname);

        // set key 'slug' into $val_data by $slug
        $val_data['slug'] = $slug;

        //----------------END STORE--------------------------------


        //  set key 'user_id' into $val_data by $user -> id
        $val_data['user_id'] = $user->id;

        //---------STORE----------

        //if a file for the " cv " key was uploaded
        if ($request->hasFile('cv')) {

            //import the file into the storage folder and save path into $image_path
            $img_path = Storage::put('public/uploads/', $request->cv);

            //set key 'cv' whit img path
            $val_data['cv'] = $img_path;
        }

        //if a file for the " doctor_image " key was uploaded
        if ($request->hasFile('doctor_image')) {

            //import the file into the storage folder and save path into $image_path
            $img_path = Storage::put('public/uploads/', $request->doctor_image);

            //set key 'doctor_image'' whit img path
            $val_data['doctor_image'] = $img_path;
        }

        //-------------------------END STORE-------------------------


        // create new profile whit $val_data by model Profile
        $new_profile = Profile::create($val_data);

        //dd($new_profile);

        // if there are 'specializations'
        if ($request->has('specializations')) {

            //attach the specializations into $new_profile
            $new_profile->specializations()->attach($request->specializations);
        }

        // redirect to index page with success message 
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
        // get data by current user
        $user = Auth::user();

        // set $profile equivalent into user -> profile
        $profile = $user->profile;

        // take specializations from db
        $specializations = Specialization::all();

        // return to edit page whit specialization , user and profile 
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
        // get data by current user
        $user = Auth::user();

        //dd($user->id);

        // get validate data from form
        $val_data =  $request->validated();

        // set $profile equivalent into user -> profile
        $profile = $user->profile;








        //check if profile already exist
        // if ($profile) {
        //     return to_route('profiles.index')->with('message', 'Profile already exist');
        // }


        //------------SLUG----------------------

        // get user name and set into $name
        $name = $user->name;

        // get user surname and set into $surname
        $surname = $user->surname;

        //  use function 'generationSlug' for create slug whit ($name $surname)
        $slug = Profile::generateSlug($name, $surname);

        // set key 'slug' into $val_data by $slug
        $val_data['slug'] = $slug;

        //------------END SLUG----------------------

        //  set key 'user_id' into $val_data by $user -> id
        $val_data['user_id'] = $user->id;


        //---------STORE----------

        //if a file for the " cv " key was uploaded
        if ($request->hasFile('cv')) {

            //if there is an old file into 'cv' key
            if ($profile->cv) {

                //delete file into storage folder
                Storage::delete($profile->cv);
            }

            //import the file into the storage folder and save path into $image_path
            $img_path = Storage::put('public/uploads/', $request->cv);

            //set key 'cv' whit img path
            $val_data['cv'] = $img_path;
        }

        //if a file for the " doctor_image " key was uploaded
        if ($request->hasFile('doctor_image')) {

            //if there is an old file into 'doctor_image' key
            if ($profile->doctor_image) {

                //delete file into storage folder
                Storage::delete($profile->doctor_image);
            }

            //import the file into the storage folder and save path into $image_path
            $img_path = Storage::put('public/uploads/', $request->doctor_image);

            //set key 'doctor_image'' whit img path
            $val_data['doctor_image'] = $img_path;
        }

        //-----------------------END STORE------------------------


        //update $profile whit $val_data
        $profile->update($val_data);


        //dd($new_profile);


        //if there are 'specializations'
        if ($request->has('specializations')) {

            //sync the specializations  into $profile
            $profile->specializations()->sync($request->specializations);
        }

        // return to index page whit success message
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
        
        //if there is an old file into 'doctor_image' key
        if ($profile->doctor_image) {

            //delete file into storage folder
            Storage::delete($profile->doctor_image);
        }

        //if there is an old file into 'cv' key
        if ($profile->cv) {

            //delete file into storage folder
            Storage::delete($profile->cv);
        }


        //delete $profile 
        $profile->delete();

        //return to index page whit success message
        return to_route('profiles.index')->with('message', 'Profile deleted successfully');
    }
}

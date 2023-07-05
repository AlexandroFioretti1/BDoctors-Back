<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request) 
    {
        //take selectedSpecializations from FrontEnd
        $selectedSpecialization = $request->query('specialization_id');

        //take all profile
        $profiles = Profile::with('reviews', 'votes', 'specializations', 'user');

        //check if has a specialization in a select
        if ($selectedSpecialization) {

            //overwrite profiles
            //check if specialization_id matches with selectSpecialization
            $profiles = $profiles->whereHas('specializations', function ($query) use ($selectedSpecialization) {
                $query->where('id', $selectedSpecialization);
            })->get();

            } else {
             //get all profile  by paginate with tables connect 'rewies','votes','specializzation','user'
            $profiles = Profile::with('reviews','votes','specializations','user')->paginate(10);
        }

        //return file json with status success and $profiles
        return response()->json([
            "success" => true,
            "results" => $profiles
        ]);
    }
}
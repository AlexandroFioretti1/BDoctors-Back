<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        //get all profile  by paginate
        $profiles = Profile::paginate(10);
        
        //return file json with status success and $profiles
        return response()->json([
            "success" => true,
            "results" => $profiles
        ]);
    }
}

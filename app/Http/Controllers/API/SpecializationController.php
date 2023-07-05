<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index() 
    {
        //get all specializations
        $specializations = Specialization::all();

        //return file json with status success and $specializations
        return response()->json([
            "success" => true,
            "results" => $specializations
        ]);
    }
}
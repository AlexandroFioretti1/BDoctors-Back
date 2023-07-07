<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        //take params from FrontEnd
        $selectedSpecialization = $request->query('specialization_id');
        $selectedVote = $request->query('vote');
        $selectedReview = $request->query('review');

        //take all profile
        $profiles = Profile::with('reviews', 'votes', 'specializations', 'user');

        //check if has a specialization in a select
        if ($selectedSpecialization) {
            //overwrite profiles
            //check if specialization_id matches with selectSpecialization
            $profiles = $profiles->whereHas('specializations', function ($query) use ($selectedSpecialization) {
                $query->where('id', $selectedSpecialization);
            })->get();


            if ($selectedVote) {
                if ($selectedVote == 'all') {
                    
                    //$profiles = Profile::with('reviews', 'votes', 'specializations', 'user');
                    $profiles = Profile::with('reviews', 'votes', 'specializations', 'user')->whereHas('specializations', function ($query) use ($selectedSpecialization) {
                        $query->where('id', $selectedSpecialization);
                    })->get();

                    //dd($profiles);

                }else{

                    $profiles = $profiles->where('average_vote', $selectedVote);

                }
            }

            if($selectedReview){
                //dd($selectedReview);
                //dd($profiles);  

                /* $profiles = $profiles->filter(function ($profile) use ($selectedReview) {
                    return $profile->selectedReview >= 3; // Modifica la condizione di filtraggio come necessario
                }); */
                
                //dd($profiles);
                $profiles = $profiles->whereBetween($selectedReview,[1,3]);
                dd($profiles);
            }
        } else {
            //get all profile  by paginate with tables connect 'rewies','votes','specializzation','user'
            $profiles = Profile::with('reviews', 'votes', 'specializations', 'user')->paginate(10);
        }

        //return file json with status success and $profiles
        return response()->json([
            "success" => true,
            "results" => $profiles
        ]);
    }

    public function show($slug)
    {
        $profile = Profile::with(['reviews', 'votes', 'specializations', 'user'])->where("slug", $slug)->first();

        if ($profile) {
            return response()->json([
                "success" => true,
                "profile" => $profile,
            ]);
        } else {
            return response()->json([
                "success" => false,
                "profile" => "profile not found"
            ]);
        }
    }
}

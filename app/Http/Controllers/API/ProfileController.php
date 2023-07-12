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
            })->orderByDesc('isSponsored')->get();

            /* selectedVote  */
            if ($selectedVote) {
                if ($selectedVote == 'all') {
                    $profiles = Profile::with('reviews', 'votes', 'specializations', 'user')->whereHas('specializations', function ($query) use ($selectedSpecialization) {
                        $query->where('id', $selectedSpecialization);
                    })->orderByDesc('isSponsored')->get();
                } else {
                    $profiles = $profiles->where('average_vote', '>=', $selectedVote)->orderByDesc('isSponsored')->get();
                }
            }

            if ($selectedReview) {

                if ($selectedReview == 1) {
                    $profiles = $profiles->where('counter_reviews', null)->where('counter_reviews', '<=', 2)->orderByDesc('isSponsored')->get();
                } elseif ($selectedReview == 2) {
                    $profiles = $profiles->where('counter_reviews', '>', 2)->where('counter_reviews', '<', 5)->orderByDesc('isSponsored')->get();
                } elseif ($selectedReview == 3) {
                    $profiles = $profiles->where('counter_reviews', '>=', 5)->orderByDesc('isSponsored')->get();
                } elseif ($selectedReview == 'all') {
                    $profiles = $profiles->all()->orderByDesc('isSponsored')->get();
                }
            }
        } else {
            //get all profile  by paginate with tables connect 'rewies','votes','specializzation','user'
            // $profiles = Profile::with('reviews', 'votes', 'specializations', 'user')->paginate(10);
            $profiles = $profiles->where('isSponsored', 1)->paginate(10);
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

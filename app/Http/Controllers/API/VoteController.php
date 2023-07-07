<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate(
            [
                'vote' => ['nullable'],
                'profile_id' => ['nullable'],
                'time' => ['nullable'],
            ]
        );

        $newvote = Vote::create($validatedData);

    }
}

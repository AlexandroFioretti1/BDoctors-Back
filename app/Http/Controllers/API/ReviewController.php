<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {

        // dd($request);
        $validatedData = $request->validate([
            'text' => ['nullable'],
            'name' => ['nullable'],
            'surname' => ['nullable'],
            'date' => ['nullable'],
            'email' => ['nullable'],
            'profile_id' => ['nullable'],
        ]);

        $slug = $request->validate(['slug' => ['nullable']]);

        $superSlug = $slug["slug"];

        $newReview = Review::create($validatedData);

        return redirect("http://localhost:5174/single-profile/" . $superSlug);
    }
}

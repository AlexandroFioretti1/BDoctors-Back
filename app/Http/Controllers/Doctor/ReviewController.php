<?php

namespace App\Http\Controllers\Doctor;


use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
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

        $startDate = Carbon::now()->subMonth()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $messages = Message::where('user_id', $user->id)->whereBetween('created_at', [$startDate, $endDate])->orderBy('created_at')->get()->groupBy(function($message){
            return $message->created_at->format('m-d');
        })->map(function($groupedMessage){
            return count($groupedMessage) ;
        });



        $votes = Vote::where('profile_id', $profile->id)
            ->select('vote', DB::raw('count(*) as total_votes'))
            ->groupBy('vote')
            ->pluck('total_votes', 'vote')
            ->toArray();


        $reviews = Review::where('profile_id', $profile->id)->orderByDesc('id')->get();
        return view('doctor.reviews', compact('reviews', 'profile', 'votes', 'messages'));
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
<?php

namespace Database\Seeders;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = config('reviews');
        foreach ($reviews as  $review) {
            $newReview = new Review();
            $newReview->text = $review['text'];
            $newReview->date = $review['date'];
            $newReview->name = $review['name'];
            $newReview->surname = $review['surname'];
            $newReview->email = $review['email'];
            $newReview->profile_id = $review['profile_id'];
            $newReview-> save();
        }
    }
}

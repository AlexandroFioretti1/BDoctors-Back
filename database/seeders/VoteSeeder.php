<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { {
            $votes = config('votes');
            foreach ($votes as  $vote) {
                $newVote = new Vote();
                $newVote->vote = $vote['vote'];
                $newVote->profile_id = $vote['profile_id'];
                $newVote->time = $vote['time'];
                $newVote->save();
            }
        }
    }
}

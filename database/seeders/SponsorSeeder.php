<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //db file 

        $sponsors = config('sponsors');

        foreach ($sponsors as $sponsor) {
            $newSponsor = new Sponsor();
            $newSponsor->name = $sponsor['name'];
            $newSponsor->duration = $sponsor['duration'];
            $newSponsor->price = $sponsor['price'];
            $newSponsor->save();
        }
    }
}

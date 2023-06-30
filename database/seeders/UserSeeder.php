<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // db file
      $doctors = config('doctors');

        foreach ($doctors as $doctor) {
            $newDoctor = new User();
            $newDoctor->name = $doctor['name'];
            $newDoctor->surname = $doctor['surname'];
            $newDoctor->address = $doctor['address'];
            $newDoctor->email = $doctor['email'];
            $password = Hash::make($doctor['password']);
            $newDoctor->password = $password;
            $newDoctor->save();
        }
    }
}

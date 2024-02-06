<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, $num_utenti = 1)
    {
        // $newUser = new User();
        // $newUser->name = "Admin";
        // $newUser->email = "jimmyguastella@gmail.com";
        // $newUser->password = "password";
        // $newUser->save();


        for ($i = 0; $i < $num_utenti; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make("password");
            $newUser->save();
        }
    }
}

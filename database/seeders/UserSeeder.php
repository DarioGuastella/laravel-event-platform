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
    public function run(Faker $faker, $num_utenti)
    {
        $newUser = new User();
        $newUser->name = "Dario Guastella";
        $newUser->email = "jimmyguastella@gmail.com";
        $newUser->password = Hash::make("password");
        $newUser->save();


        for ($i = 0; $i < $num_utenti; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make("password");
            $newUser->save();
        }
    }
}

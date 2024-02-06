<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $num_utenti = $this->command->ask("Quanti utenti?");
        $num_eventi = $this->command->ask("Quanti eventi?");

        $this->callWith(UserSeeder::class, compact("num_utenti"));
        $this->callWith(EventSeeder::class, compact("num_eventi", "num_utenti"));

        // $this->call(EventSeeder::class, false, compact("eventi"));

        $this->call([
            UserSeeder::class,
            EventSeeder::class,
            TagSeeder::class
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($num_eventi, $num_utenti, Faker $faker) //funziona se metto $num_eventu = 3 ad esempio
    {
        for ($i = 0; $i < $num_eventi; $i++) {
            $newEvent = new Event();
            $newEvent->user_id = $faker->numberBetween(1, $num_utenti);
            $newEvent->name = $faker->sentence(3);
            $newEvent->date = $faker->date();
            $newEvent->available_tickets = $faker->randomNumber(3, false);
            $newEvent->save();
        }
        // $events = [,
        //     [
        //         'name' => 'Concerto 2',
        //         'date' => '2024-02-12',
        //         'available_tickets' => 300
        //     ],
        //     [
        //         'name' => 'Concerto 3',
        //         'date' => '2024-01-15',
        //         'available_tickets' => 300
        //     ],
        //     [
        //         'name' => 'Concerto 4',
        //         'date' => '2024-03-15',
        //         'available_tickets' => 150
        //     ]
        // ];

        // foreach ($events as $event) {

        //     $newEvent = new Event();
        //     $newEvent->fill($event);
        //     $newEvent->save();
        // }
    }
}

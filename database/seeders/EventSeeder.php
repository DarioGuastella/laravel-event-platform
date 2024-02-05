<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'name' => 'Concerto 1',
                'date' => '2024-01-22',
                'available_tickets' => 150
            ],
            [
                'name' => 'Concerto 2',
                'date' => '2024-02-12',
                'available_tickets' => 300
            ],
            [
                'name' => 'Concerto 3',
                'date' => '2024-01-15',
                'available_tickets' => 300
            ],
            [
                'name' => 'Concerto 4',
                'date' => '2024-03-15',
                'available_tickets' => 150
            ]
        ];

        foreach ($events as $event) {

            $newEvent = new Event();
            $newEvent->fill($event);
            $newEvent->save();
        }
    }
}

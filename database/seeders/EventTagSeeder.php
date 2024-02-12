<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class EventTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $EventsTags = [
                [
                    "event_id" => $faker->randomElement($this->getEventID()),
                    "tag_id" => $faker->randomElement($this->getTagID())
                ]
            ];

            foreach ($EventsTags as $EventTag) {
                DB::table('event_tag')->insert($EventTag);
            }
        }
    }


    private function getEventID()
    {
        return Event::all()->pluck('id');
    }

    private function getTagID()
    {
        return Tag::all()->pluck('id');
    }
}

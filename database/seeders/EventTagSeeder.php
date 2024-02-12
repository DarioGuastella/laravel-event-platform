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
        for ($i = 0; $i < 100; $i++) {
            $eventId = $faker->randomElement($this->getEventID());
            $tagId = $faker->randomElement($this->getTagID());
            $EventsTags = [
                [
                    "event_id" => $eventId,
                    "tag_id" => $tagId
                ]
            ];

            foreach ($EventsTags as $EventTag) {
                DB::table('event_tag')->updateOrInsert($EventTag);
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

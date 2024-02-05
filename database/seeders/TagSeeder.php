<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'country',
            ],
            [
                'name' => 'rock',
            ],
            [
                'name' => 'pop',
            ],
            [
                'name' => 'hip hop',
            ],
            [
                'name' => 'trance',
            ],
            [
                'name' => 'classica',
            ],
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->fill($tag);
            $newTag->save();
        }
    }
}

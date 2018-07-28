<?php

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('songs')->insert([
                'name' => 'example sounds'.$i,
                'source' => 'https://www.sample-videos.com/audio/mp3/crowd-cheering.mp3',
                'category_id' => rand(1, 3),
            ]);
        }
    }
}

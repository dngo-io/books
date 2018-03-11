<?php

use Illuminate\Database\Seeder;

class BookAudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        entity(\App\Entities\BookAudio::class,500)->create();
    }
}

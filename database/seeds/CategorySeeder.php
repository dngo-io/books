<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            'action' => 'Action',
            'thriller' => 'Thriller',
            'western' => 'Western'
        ];

        foreach ($categories as $slug => $name) {

            DB::table('categories')->insert([
                'name' => $name,
                'slug' => $slug,
            ]);

        }

    }
}

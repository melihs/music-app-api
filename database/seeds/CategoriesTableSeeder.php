<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Kus Sesleri',
        ]);

        DB::table('categories')->insert([
            'name' => 'Doga Sesleri',
        ]);

        DB::table('categories')->insert([
            'name' => 'Piyano Sesleri',
        ]);
    }
}

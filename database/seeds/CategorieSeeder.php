<?php

use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['nom' => 'Voitures'],
            ['nom' => 'Technologie'],
            ['nom' => 'Voyages'],
            ['nom' => 'Gaming'],
            ['nom' => 'Actualité'],
        ]);
    }
}

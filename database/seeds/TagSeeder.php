<?php

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
        DB::table('tags')->insert([
            ['nom' => 'BMW'],
            ['nom' => 'React'],
            ['nom' => 'Javascript'],
            ['nom' => '2020'],
            ['nom' => 'Audi'],
            ['nom' => 'Promo']
        ]);
    }
}

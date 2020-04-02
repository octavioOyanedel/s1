<?php

use Illuminate\Database\Seeder;

class RentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Renta::create(['valor' => 2]);
    }
}

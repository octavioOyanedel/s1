<?php

use Illuminate\Database\Seeder;

class BancosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Banco::create(['nombre' => 'Banco Estado']);
        App\Banco::create(['nombre' => 'Scotiabank']);     
    }
}

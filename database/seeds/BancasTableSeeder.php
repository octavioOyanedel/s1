<?php

use Illuminate\Database\Seeder;

class BancasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Banca::create(['numero' => '012-247-0296', 'cuenta_id' =>1, 'banco_id' =>1]);
        App\Banca::create(['numero' => '014-00-0096', 'cuenta_id' =>1, 'banco_id' =>2]);      
    }
}

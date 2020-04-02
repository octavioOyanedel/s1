<?php

use Illuminate\Database\Seeder;

class MetodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Metodo::create(['nombre' => 'Descuento por planilla']);
        App\Metodo::create(['nombre' => 'Depósito']);        
    }
}

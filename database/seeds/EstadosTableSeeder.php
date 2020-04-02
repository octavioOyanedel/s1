<?php

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Estado::create(['nombre' => 'Activo']);
        App\Estado::create(['nombre' => 'Jubilado']);
        App\Estado::create(['nombre' => 'Renuncia Voluntaria']);
        App\Estado::create(['nombre' => 'Desvinculación PUCV']);
        App\Estado::create(['nombre' => 'Fallecido']);
    }
}

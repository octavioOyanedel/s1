<?php

use Illuminate\Database\Seeder;

class ConsejerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Consejero::create(['concepto' => 'Asesor Jurídico', 'nombre' => 'Alfonso Muñoz']);
        App\Consejero::create(['concepto' => 'Asesor Relaciones Públicas', 'nombre' => 'Gabriel Toro']);
        App\Consejero::create(['concepto' => 'Librería PUCV', 'nombre' => 'Leni León']);
        App\Consejero::create(['concepto' => 'VTR', 'nombre' => 'Leni León']);
        App\Consejero::create(['concepto' => 'Secretaria Sindicato', 'nombre' => 'Ximena Barrueto Martínez']);
        App\Consejero::create(['concepto' => 'Dirigentes', 'nombre' => '']);
        App\Consejero::create(['concepto' => 'Contadora', 'nombre' => '']);
        App\Consejero::create(['concepto' => 'PUCV', 'nombre' => '']);  
        App\Consejero::create(['concepto' => 'Sindicato', 'nombre' => '']);
    }
}

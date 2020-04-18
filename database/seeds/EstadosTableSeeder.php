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
        App\Estado::create(['nombre' => 'Pagado']);
        App\Estado::create(['nombre' => 'Activo']);
        App\Estado::create(['nombre' => 'Atrasado']);
    }
}

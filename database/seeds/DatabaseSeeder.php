<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ComunasTableSeeder::class);
        $this->call(UrbesTableSeeder::class);
        $this->call(CiudadaniasTableSeeder::class);
        $this->call(SedesTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(SociosTableSeeder::class);
        $this->call(ParentescosTableSeeder::class);
        $this->call(GradosTableSeeder::class);
        $this->call(CuentasTableSeeder::class);
        $this->call(BancosTableSeeder::class);
        $this->call(BancasTableSeeder::class);
        $this->call(MetodosTableSeeder::class);
        $this->call(RentasTableSeeder::class);
        $this->call(EstadosTableSeeder::class);
        $this->call(CriteriosTableSeeder::class);
        $this->call(ConsejerosTableSeeder::class);
        $this->call(TiposTableSeeder::class);
        $this->call(PrivilegiosTableSeeder::class);
    }
}

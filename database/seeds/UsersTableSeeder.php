<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create();

        App\User::create([
            'nombre1' => 'Carolina',
            'nombre2' => null,
            'apellido1' => 'Mena',
            'apellido2' => 'Serrano',
            'email' => 'carolina.mena@pucv.cl',
	        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
	        'privilegio_id' => 2,
	        'remember_token' => Str::random(10),
        ]);

        App\User::create([
            'nombre1' => 'Osvaldo',
            'nombre2' => 'Valentín',
            'apellido1' => 'León',
            'apellido2' => 'montenegro',
            'email' => 'osvaldo.leon@pucv.cl',
	        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
	        'privilegio_id' => 3,
	        'remember_token' => Str::random(10),
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
                [
                    'nombre_completo' => 'Juan Gómez',
                    'correo_electronico' => 'go.juangomez23@gmail.com',
                    'telefono' => '+573188315485',
                    'rol_id' => 1,
                    'password' => bcrypt('password')
                ]
            ]);
            
    }
}

<?php

use Illuminate\Database\Seeder;

class DiscoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discos')->insert([
            [
                'nombre' => 'Our Destiny',
                'album' => 'Design Your Universe',
                'artista' => 'Epica',
                'genero' => 'Metal sinfonico',
                'anio' => '2020-06-09',
                'foto' => 'https://metalcry.com/wp-content/uploads/2018/07/Epica_DesignYourUniverse-270x270.jpg'
            ],
            [
                'nombre' => 'Unleashed',
                'album' => 'Design Your Universe',
                'artista' => 'Epica',
                'genero' => 'Metal sinfonico',
                'anio' => '2020-06-09',
                'foto' => 'https://metalcry.com/wp-content/uploads/2018/07/Epica_DesignYourUniverse-270x270.jpg'
            ],
            [
                'nombre' => 'Samadhi',
                'album' => 'Design Your Universe',
                'artista' => 'Epica',
                'genero' => 'Metal sinfonico',
                'anio' => '2020-06-09',
                'foto' => 'https://metalcry.com/wp-content/uploads/2018/07/Epica_DesignYourUniverse-270x270.jpg'
            ],
            [
                'nombre' => 'Martyr Of The Free World',
                'album' => 'Design Your Universe',
                'artista' => 'Epica',
                'genero' => 'Metal sinfonico',
                'anio' => '2020-06-09',
                'foto' => 'https://metalcry.com/wp-content/uploads/2018/07/Epica_DesignYourUniverse-270x270.jpg'
            ],
            [
                'nombre' => 'Burn To A Cinder',
                'album' => 'Design Your Universe',
                'artista' => 'Epica',
                'genero' => 'Metal sinfonico',
                'anio' => '2020-06-09',
                'foto' => 'https://metalcry.com/wp-content/uploads/2018/07/Epica_DesignYourUniverse-270x270.jpg'
            ],
            
            
        ]);
    }
}

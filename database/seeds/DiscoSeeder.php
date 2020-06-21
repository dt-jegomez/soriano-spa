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
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/gmz-juxn.appspot.com/o/epica-the-holographic-principle-cd-nuevo-D_NQ_NP_753003-MLA31020336621_062019-F.jpg?alt=media&token=20bc24b7-993f-4337-b5b8-33718812f2ca'
            ],
            [
                'nombre' => 'Unleashed',
                'album' => 'Design Your Universe',
                'artista' => 'Epica',
                'genero' => 'Metal sinfonico',
                'anio' => '2020-06-09',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/gmz-juxn.appspot.com/o/epica-the-holographic-principle-cd-nuevo-D_NQ_NP_753003-MLA31020336621_062019-F.jpg?alt=media&token=20bc24b7-993f-4337-b5b8-33718812f2ca'
            ],
            [
                'nombre' => 'Samadhi',
                'album' => 'Design Your Universe',
                'artista' => 'Epica',
                'genero' => 'Metal sinfonico',
                'anio' => '2020-06-09',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/gmz-juxn.appspot.com/o/epica-the-holographic-principle-cd-nuevo-D_NQ_NP_753003-MLA31020336621_062019-F.jpg?alt=media&token=20bc24b7-993f-4337-b5b8-33718812f2ca'
            ],
            [
                'nombre' => 'Martyr Of The Free World',
                'album' => 'Design Your Universe',
                'artista' => 'Epica',
                'genero' => 'Metal sinfonico',
                'anio' => '2020-06-09',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/gmz-juxn.appspot.com/o/epica-the-holographic-principle-cd-nuevo-D_NQ_NP_753003-MLA31020336621_062019-F.jpg?alt=media&token=20bc24b7-993f-4337-b5b8-33718812f2ca'
            ],
            [
                'nombre' => 'Burn To A Cinder',
                'album' => 'Design Your Universe',
                'artista' => 'Epica',
                'genero' => 'Metal sinfonico',
                'anio' => '2020-06-09',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/gmz-juxn.appspot.com/o/epica-the-holographic-principle-cd-nuevo-D_NQ_NP_753003-MLA31020336621_062019-F.jpg?alt=media&token=20bc24b7-993f-4337-b5b8-33718812f2ca'
            ],
            
            
        ]);
    }
}

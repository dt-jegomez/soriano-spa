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
                'album' => 'Design Universe',
                'artista' => 'devyl wear prada',
                'genero' => 'hard core',
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
            [
                'nombre' => 'Burn',
                'album' => 'Your Universe',
                'artista' => 'lady gaga',
                'genero' => 'pop',
                'anio' => '2020-06-09',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/gmz-juxn.appspot.com/o/epica-the-holographic-principle-cd-nuevo-D_NQ_NP_753003-MLA31020336621_062019-F.jpg?alt=media&token=20bc24b7-993f-4337-b5b8-33718812f2ca'
            ],
            [
                'nombre' => 'el aguacero',
                'album' => 'Palo de Agua',
                'artista' => 'Mauricio & Palo de Agua',
                'genero' => 'tropical',
                'anio' => '2020-06-09',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/gmz-juxn.appspot.com/o/download%20(2).jpg?alt=media&token=f710bee7-28d2-4ee9-a03e-09eac2d6376f'
            ],
            [
                'nombre' => ' No One',
                'album' => ' No One - EP',
                'artista' => 'Alicia Keys',
                'genero' => 'Neo soul y R&B contemporáneo',
                'anio' => '2020-06-09',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/gmz-juxn.appspot.com/o/download%20(3).jpg?alt=media&token=8d43c0e4-8509-44da-8362-5c9b78019a42'
            ],
            [
                'nombre' => 'kiss you',
                'album' => 'Take Me Home',
                'artista' => 'One Direction',
                'genero' => 'Pop adolescente',
                'anio' => '2020-06-09',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/gmz-juxn.appspot.com/o/download%20(3).jpg?alt=media&token=8d43c0e4-8509-44da-8362-5c9b78019a42'
            ],
            [
                'nombre' => 'Uprising',
                'album' => 'Uprising',
                'artista' => 'Muse',
                'genero' => 'Alternativa/independiente',
                'anio' => '2020-06-09',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/gmz-juxn.appspot.com/o/download%20(3).jpg?alt=media&token=8d43c0e4-8509-44da-8362-5c9b78019a42'
            ],
            
            
        ]);
    }
}

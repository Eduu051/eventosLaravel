<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $eventos = [
            [
                'nombre'=>'Circus Maximus, Travis Scott',
                'descripcion'=>'Concierto del rapero Travis Scott en Wizink Center de Madrid',
                'fecha_evento'=>'2026-07-30',
                'hora'=>'21:00',
                'max_personas'=>4000,
                'edad_minima'=>17,
                'imagen'=>'https://m.media-amazon.com/images/I/81UIqmn17WL.jpg',
                'category_id'=>1
            ],
            [
                'nombre'=>'Grand National Tour',
                'descripcion'=>'Concierto conjunto de Kendrick Lamar y SZA que llega a Barcelona este verano',
                'fecha_evento'=>'2025-07-30',
                'hora'=>'21:00',
                'max_personas'=>10,
                'edad_minima'=>18,
                'imagen'=>'https://dynamicmedia.livenationinternational.com/l/f/x/6199d559-d78a-4399-bf35-32abfecee1d6.jpg?format=webp&width=3840&quality=75',
                'category_id'=>1
            ],
            [
                'nombre'=>'Romeo y Julieta',
                'descripcion'=>'Romeo y Julieta es una tragedia del dramaturgo inglés William Shakespeare adaptada al teatro',
                'fecha_evento'=>'2025-07-14',
                'hora'=>'16:00',
                'max_personas'=>40,
                'edad_minima'=>15,
                'imagen'=>'https://wp.es.aleteia.org/wp-content/uploads/sites/7/2017/04/web-paint-romeo-juliet-dicksee-public-domain.jpg',
                'category_id'=>5
            ],
            [
                'nombre'=>'Maratón de Cine Clásico',
                'descripcion'=>'Proyección continua de películas clásicas de los años 50 y 60',
                'fecha_evento'=>'2025-08-10',
                'hora'=>'16:00',
                'max_personas'=>200,
                'edad_minima'=>12,
                'imagen'=>'https://s3.abcstatics.com/media/play/2021/11/20/Imagenrick-kJaD--1248x698@abc.jpg',
                'category_id'=>2
            ],
            [
                'nombre'=>'Festival Indie Barcelona',
                'descripcion'=>'Festival de música independiente con bandas nacionales e internacionales',
                'fecha_evento'=>'2025-09-05',
                'hora'=>'18:00',
                'max_personas'=>10000,
                'edad_minima'=>16,
                'imagen'=>'https://www.marinaportvell.com/wp-content/uploads/2024/05/festival-primavera-sound-barcelona-2024.png',
                'category_id'=>3
            ],
            [
                'nombre'=>'El Rey León - El Musical',
                'descripcion'=>'Musical basado en la película clásica de Disney, con escenografía espectacular',
                'fecha_evento'=>'2026-10-12',
                'hora'=>'20:30',
                'max_personas'=>1500,
                'edad_minima'=>6,
                'imagen'=>'https://mediaportal.stage-entertainment.com/images/media/2D618789-C046-48AE-8512FA1E01EA5677',
                'category_id'=>4
            ],
            [
                'nombre'=>'Hamlet de Shakespeare',
                'descripcion'=>'Representación teatral de la obra clásica en el Teatro Español de Madrid',
                'fecha_evento'=>'2025-11-20',
                'hora'=>'19:00',
                'max_personas'=>800,
                'edad_minima'=>14,
                'imagen'=>'https://cdn.culturagenial.com/es/imagenes/hamlet-og.jpg',
                'category_id'=>5
            ]

        ];

        $categorias = [
            ['nombre'=>'concierto'],
            ['nombre'=>'cine'],
            ['nombre'=>'festival'],
            ['nombre'=>'musical'],
            ['nombre'=>'teatro']
        ];

        $admin = [
            'name' => 'admin',
            'email' => 'admin@admin.cat',
            'password' => bcrypt('admin123'),
            'fecha_nacimiento' => '2001-09-11',
            'rol' => 'admin'
        ];
        DB::table('users')->insert($admin);
        DB::table('categories')->insert($categorias);
        DB::table('esdeveniments')->insert($eventos);
    }
}

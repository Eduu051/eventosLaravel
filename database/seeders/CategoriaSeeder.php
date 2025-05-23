<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre'=>'concierto'],
            ['nombre'=>'cine'],
            ['nombre'=>'festival'],
            ['nombre'=>'musical'],
            ['nombre'=>'teatro']
        ];
        DB::table('categories')->insert($categorias);
    }
}

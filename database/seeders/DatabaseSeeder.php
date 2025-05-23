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
        $admin = [
            'name' => 'admin',
            'email' => 'admin@admin.cat',
            'password' => bcrypt('admin123'),
            'fecha_nacimiento' => '2001-09-11',
            'rol' => 'admin'
        ];
        DB::table('users')->insert($admin);
    }
}

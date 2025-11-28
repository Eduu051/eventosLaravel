<?php

namespace Esdeveniments\Tests\Feature;

use App\Models\Esdeveniment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EventosTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_homepage_loads()
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
            'fecha_nacimiento' => '1990-01-01',
            'rol' => 'admin',
        ]);
        $this->actingAs($user)->get('/index/admin')->assertStatus(200)->assertSee('EVENTOS DISPONIBLES');
    }

    public function test_we_can_create_an_event()
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
            'fecha_nacimiento' => '1990-01-01',
            'rol' => 'admin',
        ]);
        $categoryId = DB::table('categories')->insertGetId(['nombre' => 'Music']);

        $response = $this->actingAs($user)->post('/evento/admin/store', [
            'nombre' => 'PlayboiCarti Concert',
            'descripcion' => 'Concert de Playboi Carti a Barcelona',
            'fecha_evento' => '2024-12-01',
            'hora' => '20:00',
            'max_personas' => 500,
            'edad_minima' => 18,
            'imagen' => 'https://example.com/image.jpg',
            'category_id' => $categoryId,
        ]);

        $response->assertRedirect('/index/admin?mensaje=creado');
        $this->assertDatabaseHas('esdeveniments', ['nombre' => 'PlayboiCarti Concert']);
    }

    public function test_we_can_delete_an_event()
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
            'fecha_nacimiento' => '1990-01-01',
            'rol' => 'admin',
        ]);
        $categoryId = DB::table('categories')->insertGetId(['nombre' => 'Temp']);

        $eventId = DB::table('esdeveniments')->insertGetId([
            'nombre' => 'Evento a eliminar',
            'descripcion' => 'Descripcion del evento a eliminar',
            'fecha_evento' => '2024-11-01',
            'hora' => '18:00',
            'max_personas' => 100,
            'edad_minima' => 16,
            'imagen' => 'https://example.com/image.jpg',
            'category_id' => $categoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->actingAs($user)->get('/evento/eliminar/' . $eventId . '/admin');
        $response->assertRedirect('/index/admin?mensaje=eliminado');
        $this->assertDatabaseMissing('esdeveniments', ['id' => $eventId]);
    }
}
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Persona;
use Tests\TestCase;

class PersonaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarUnoQueExiste()
    {
        $estructura = [
            "id","nombre","apellido","created_at","updated_at","deleted_at"
        ];
        $response = $this->get('/api/personas/50000');

        $response->assertStatus(200);
        $response->assertJsonCount(6);
        $response->assertJsonStructure($estructura);
    }

    public function test_ListarUnoQueNoExiste(){
        $response = $this->get('/api/personas/5554444');
        $response->assertStatus(404);
    }

    public function test_EliminarUnoQueExiste(){
        $response = $this->delete('/api/personas/50001');
        $response->assertStatus(200);
        $response->assertJsonFragment([
             "mensaje" => "Persona 50001 eliminada."
        ]);
        $this->assertDatabaseMissing('personas', [
            'id' => '50001',
            'deleted_at' => null
        ]);
        Persona::withTrashed()->where("id",50001)->restore();
    }

    public function test_EliminarUnoQueNoExiste(){
        $response = $this->delete('/api/personas/5554444');
        $response->assertStatus(404);
    }

    public function test_ModificarUnoQueNoExiste(){
        $response = $this->put('/api/personas/5554444');
        $response->assertStatus(404);
    }

    public function test_ModificarUnoQueExiste(){
        $estructura = [
            "id",
            "nombre",
            "apellido",
            "created_at",
            "updated_at",
            "deleted_at"
        ];

        $response = $this->put('/api/personas/50002',[
            "nombre" => "Javier",
            "apellido" => "Gonzalez"
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            "nombre" => "Javier",
            "apellido" => "Gonzalez"
        ]);

    }
    public function test_Insertar()
    {
        $response = $this->post('/api/personas/',[ "nombre" => "Pedrito", "apellido" => "Gomez"]);

        $response->assertStatus(201);
        $response->assertJsonCount(5);
        $this->assertDatabaseHas('personas', [
            'nombre' => 'Pedrito',
            'apellido' => 'Gomez'
        ]);

    }

    

}

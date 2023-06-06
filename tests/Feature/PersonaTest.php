<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarUno()
    {
        $estructura = [
            "id","nombre","apellido","created_at","updated_at","deleted_at"
        ];
        $response = $this->get('/api/personas/113');

        $response->assertStatus(200);
        $response->assertJsonCount(6);
        $response->assertJsonStructure($estructura);
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

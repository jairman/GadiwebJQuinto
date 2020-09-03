<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\registro;

class VehiculoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
      public function testIndex()
    {   
        $response = $this->get('/');

        $response->assertStatus(200)->assertSee('Listar Ordenes');
    }
    
}

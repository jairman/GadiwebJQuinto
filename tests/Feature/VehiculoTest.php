<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Illuminate\Http\Responsecall;
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\registro;
use App\Marcas;

class VehiculoTest extends TestCase
{
        
        
    // use DatabaseTransactions;   
    /**
     * A basic feature test example.
     *
     * @return void
     */
 # app/tests/controllers/PostsControllerTest.php
 
    public function testApplication()
    {
        $this->withoutMiddleware();    
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->status());
    }

    
}

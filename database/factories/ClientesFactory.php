<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Clientes;
use Faker\Generator as Faker;

$factory->define(Clientes::class, function (Faker $faker) {
    return [
        //
        'cedula' => rand(1000000,99999999),
        'nombre' => $faker->unique()->name,
        
    ];
});

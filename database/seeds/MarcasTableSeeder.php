<?php
use App\Marcas;
use Illuminate\Database\Seeder;


class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Marcas::create([
            'nombre' => 'kia',
        ]);
        Marcas::create([
            'nombre' => 'toyota',
        ]);
        
        Marcas::create([
            'nombre' => 'ford',
        ]);
        Marcas::create([
            'nombre' => 'chevrolet',
        ]);
        
        Marcas::create([
            'nombre' => 'audi',
        ]);
        Marcas::create([
            'nombre' => 'mazda',
        ]);
        
        
        
    }
}

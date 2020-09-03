<?php

namespace App\API\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\registro;
use App\Marcas;
use App\Clientes;


class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        //$registro =DB::select('SELECT CONCAT(UCASE(LEFT(nombre, 1)), LCASE(SUBSTRING(nombre, 2))) FROM `marcas` WHERE 1');
         $registro =DB::select('SELECT CONCAT(UCASE(LEFT(marca, 1)), LCASE(SUBSTRING(marca, 2))), marca,  COUNT(*) FROM registros GROUP BY marca');

         return $registro;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'cedula' => 'required|string',
            'nombre' => 'required|string',
            'marca' => 'required|string',
            'placa' => 'required|string',
            'tipo' => 'required|string'
        ]);         

            $article = registro::create($request->all());

            return response()->json($article, 201);
        /*
            if($user > 0) {
                //echo "There is data";    
                    $rules = [
                         'nombre' => 'required|max:50|unique:marcas',
                        ];

                     $this->validate($request, $rules);
                    
               
                }else 
                    Marcas::create($request->all());
                    return redirect()->route('panel.Marca.index')->withSuccess(trans('app.success_store'));
                    
            ;
            */
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $registro =registro::all();

        return view('panel.Registro.show', compact('registro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

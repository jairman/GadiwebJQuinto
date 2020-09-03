<?php

namespace App\Http\Controllers\Panel;

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
        $registro =registro::select('marca', DB::raw('count(marca) quantity'))->groupBy('marca')->get();

        return view('panel.Registro.index', compact('registro'));
    }

    public function general()
    {
        //
        $registro =registro::select('marca', DB::raw('count(marca) quantity'))->groupBy('marca')->get();

        return view('panel.Registro.index', compact('registro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          
        $marcas = Marcas::all();
        $clientes = Clientes::all();
        return view('panel.Registro.create', compact('marcas','clientes'));
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
        $user = Clientes::on('mysql')->where('id', $request->input('cliente'))->get(); 
         echo $user;
         foreach($user as $en){
            $cedula = $en->cedula;
            $nombre = $en->nombre;
            } 

            registro::create($request->all() + ['cedula' => $cedula] + ['nombre' => $nombre] );
            return redirect()->route('panel.Registro.create')->withSuccess(trans('app.success_store'));
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

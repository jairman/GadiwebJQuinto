<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\registro;
use App\Marcas;
use App\Clientes;

class PanelController extends Controller
{
    public function index(Request $request)
    {
        //return view('panel.Registro.index');
        $registro =registro::select('marca', DB::raw('count(marca) quantity'))->groupBy('marca')->get();

        return view('panel.Registro.index', compact('registro'));
    }
}

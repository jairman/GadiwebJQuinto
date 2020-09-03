<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Support\Facades\DB;
use App\User;
use App\productos;
use App\Categoria;



//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

use Validator;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$this->authorize('index', productos::class);
        
        //$items = productos::all()->sortByDesc('id');
        $items = DB::select('select  p.id,p.codigo, p.codigo_de_barras, p.descripcion,p.stock,p.precio,p.stock_minimo_notificar, p.porcentaje, p.preciocompra,c.categoria as categoria from productos p inner join categorias c on c.id=p.categoria');


        return view('panel.productos.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('panel.productos.create');
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
        

        $user = productos::on('mysql')->where('codigo', $request->input('codigo'))->count(); 
        $cat=DB::table('productos')->where('codigo', $request->input('codigo'))->whereNotNull('deleted_at')->count();
            if($user > 0) {
                //echo "There is data";    
                    $rules = [
                         'codigo' => 'required|max:50|unique:productos',
                        ];

                     $this->validate($request, $rules);
                    
               
                }else 
            
                    
                    if($cat > 0) {
                        $rules = [
                         'codigo' => 'required|max:50|unique:productos',
                        ];

                        $this->validate($request, $rules);
                    }else 
                       productos::create($request->all());
                       return redirect()->route('panel.productos.index')->withSuccess(trans('app.success_store'));
                    ;

            ; 
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
        $item = productos::findOrFail($id);
       
        return view('panel.productos.edit', compact('item'));
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
        $item = productos::findOrFail($id);
        $item->update($request->all());
        //return back()->withSuccess(trans('app.success_update'));
        return redirect()->route('panel.productos.index')->withSuccess(trans('app.success_update'));


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
        productos::find($id)->delete();
         
       // return back()->withSuccess(trans('app.success_destroy'));
        return redirect()->route('panel.productos.index')->withSuccess(trans('app.success_destroy'));
    }
}

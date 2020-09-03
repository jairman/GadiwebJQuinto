<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categoria;


class CategoriaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoria = Categoria::all()->sortByDesc('id');
        return view('panel.categoria.index', compact('categoria'));
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
       

        $user = Categoria::on('mysql')->where('categoria', $request->input('categoria'))->count(); 
        $cat=DB::table('categorias')->where('categoria', $request->input('categoria'))->whereNotNull('deleted_at')->count();
            if($user > 0) {
                //echo "There is data";    
                    $rules = [
                         'categoria' => 'required|max:50|unique:categorias',
                        ];

                     $this->validate($request, $rules);
                    
               
                }else 
            
                    
                    if($cat > 0) {
                        $rules = [
                         'categoria' => 'required|max:50|unique:categorias',
                        ];

                        $this->validate($request, $rules);
                    }else 
                        Categoria::create($request->all());
                    return redirect()->route('panel.categoria.index')->withSuccess(trans('app.success_store'));
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
        $item = Categoria::findOrFail($id);

        return view('panel.categoria.edit', compact('item'));
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
       // $item = Categoria::findOrFail($id);
        //$item->update($request->all());
        //return redirect()->route('panel.categoria.index')->withSuccess(trans('app.success_update'));
      
        $user = Categoria::on('mysql')->where('categoria', $request->input('categoria'))->count();

        $cat=DB::table('categorias')->where('categoria', $request->input('categoria'))->whereNotNull('deleted_at')->count();
        
            if($user > 0) {
                //echo "There is data";    
                    $rules = [
                         'categoria' => 'required|max:50|unique:categorias',
                        ];

                     $this->validate($request, $rules);
                    
               
                }else 
                    if($cat > 0) {
                        $rules = [
                         'categoria' => 'required|max:50|unique:categorias',
                        ];

                        $this->validate($request, $rules);
                    }else 
                        $item = Categoria::findOrFail($id);
                        $item->update($request->all());
                        return redirect()->route('panel.categoria.index')->withSuccess(trans('app.success_update'));
                    ;

            ; 
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
         Categoria::find($id)->delete();
         
       // return back()->withSuccess(trans('app.success_destroy'));
        return redirect()->route('panel.categoria.index')->withSuccess(trans('app.success_destroy'));

        

    }
}

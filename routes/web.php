<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('painel', function () {
    return redirect()->route('login');
});



Route::group(['prefix' => 'panel', 'as' => 'panel.', 'middleware' => ['auth'], 'namespace' => 'Panel'], function () {
    Route::get('dashboard', 'PanelController@index')->name('index');
   


    Route::resource('user', 'UsersController')->middleware('permission:ver_usuarios');




//++++++++++++++++ Vehículo ++++++++++++++++++++++++++++++++++++++++++++++++++     

    Route::resource('Clientes', 'ClientesController');  
    Route::resource('Marca', 'MarcaController');
    Route::resource('Registro', 'RegistroController');
    Route::post('Registro/general', 'RegistroController@general');  
    
});

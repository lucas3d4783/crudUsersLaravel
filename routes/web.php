<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::verb('uri', 'Controller@method')->name('route_name')


Route::group(['namespace' => 'Form'], function(){ # definindo um namespace para todas rotas, assim não é necessário colocar o Form no início dos métodos do controller nas rotas
    /** Obter informações
     * VERBO GET
     */
    Route::get('usuarios', 'TestController@listAllUsers')->name('users.listAll');
    Route::get('usuarios/novo', 'TestController@formAddUser')->name('users.formAddUser'); // o novo deve ficar em cima da outra rota que pode variar as suas entradas, caso contrário, a palavra novo vai se enquadrar nela e não vai pegar a rota certa
    Route::get('usuarios/editar/{user}', 'TestController@formEditUser')->name('users.formEditUser'); 
    Route::get('usuarios/{user}', 'TestController@listUser')->name('users.list');

    /** Fazer a consistência das informações
     * VERBO POST
    */
    Route::post('usuarios/store', 'TestController@storeUser')->name('users.store');

    /** Atualizar as informações 
     * VERBO PUT/PATCH
     */
    Route::put('usuarios/edit/{user}', 'TestController@edit')->name('users.edit');

    /** Deletar informações 
     * VERBO DELETE
     */
    Route::delete('usuarios/destroy/{user}', 'TestController@destroy')->name('users.destroy');
});

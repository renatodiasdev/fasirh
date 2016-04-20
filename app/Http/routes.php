<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::get('/home', 'HomeController@index');

    /**
     * Show Task Dashboard
     */
     Route::get('/tasks', 'HomeController@tasks');

    /**
     * Add New Task
     */
    Route::post('/task', 'HomeController@task');

    /**
     * Delete Task
     */
    Route::delete('/task/{id}', 'HomeController@taskdelete');

      Route::group(['prefix' => 'funcionarios'], function() {
        /**
        * Inclui um novo funcionário
        */
        Route::get('/buscar','FuncionarioController@buscar');

        Route::post('/postbusca','FuncionarioController@PostBusca');

        Route::get('/editar/{id}', 'FuncionarioController@editar');

        Route::post('/posteditar', 'FuncionarioController@PostEditar');

        Route::get('/funcionario','FuncionarioController@funcionario');

        Route::post('/salvar','FuncionarioController@salvar');

        /**
        * Exclui um funcionário
        */
        Route::delete('/delete/{id}','FuncionarioController@delete');
      });




});
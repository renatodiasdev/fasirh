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

    /**
    * Exibe as unidades criadas
    */
    Route::get('/unidades', 'HomeController@unidades');

    /**
    * Exibe os setores criados
    */
    Route::get('/setores', 'HomeController@setores');
    /**
    * Exibe os cargos criados
    */
    Route::get('/cargos', 'HomeController@cargos');
    /**
    * Exibe os tipos de situação criados
    */
    Route::get('/tiposdesituacao', 'HomeController@tiposdesituacao');
    /**
    * Cria uma unidade
    */
    Route::post('/unidade', 'HomeController@unidade');
    /* Cria um setor
    */
    Route::post('/setor', 'HomeController@setor');
    /* Cria um cargo
    */
    Route::post('/cargo', 'HomeController@cargo');
    /* Cria um tipo de situação
    */
    Route::post('/tiposituacao', 'HomeController@tiposituacao');
    /**
    * Apaga uma unidade
    */
    Route::delete('/unidade/{id}', 'HomeController@unidadedelete');
    /**
    * Apaga um setor
    */
    Route::delete('/setor/{id}', 'HomeController@setordelete');
    /**
    * Apaga um cargo
    */
    Route::delete('/cargo/{id}', 'HomeController@cargodelete');
    /**
    * Apaga um tipo de situação
    */
    Route::delete('/tiposituacao/{id}', 'HomeController@tiposituacaodelete');

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

        Route::get('/cargosporsetor/{setor_id}','FuncionarioController@buscacargos');
      });

      Route::group(['prefix' => 'situacao'], function() {
        Route::get('/situacoesporunidade','SituacaoFuncionalController@situacoesporunidade');

        Route::post('/salvar','SituacaoFuncionalController@salvar');

        Route::get('/novasituacao/{id}','SituacaoFuncionalController@novasituacao');

        Route::post('/salvaedicao','SituacaoFuncionalController@salvaedicao');

        Route::get('/editar/{id}','SituacaoFuncionalController@editar');

        Route::delete('/apagar/{id}','SituacaoFuncionalController@apagar');
      });


});

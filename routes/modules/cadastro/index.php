<?php

use App\Http\Controllers\Cadastro\FuncionarioController;

Route::group(['prefix' => 'cadastros'], function () {
    Route::group(['prefix' => 'funcionarios'], function () {
        // listagem
        Route::any('/', [FuncionarioController::class, 'index'])
            ->name('funcionarios-index')
            ->middleware('checkPermission:4')
        ;
        // delete
        Route::get('/delete/{id}', [FuncionarioController::class, 'destroy'])
            ->name('funcionarios-destroy')
            ->middleware('checkPermission:4')   
        ;
        // create
        Route::get('/create/{id}', [FuncionarioController::class, 'create'])
            ->name('funcionarios-create')
            ->middleware('checkPermission:4')
        ;
    });
});

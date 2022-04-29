<?php

use App\Http\Controllers\Cadastro\FuncionarioController;
use App\Http\Controllers\Cadastro\TanqueController;

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

    Route::group(['prefix' => 'tanques'], function () {
        // listagem
        Route::any('/', [TanqueController::class, 'index'])
            ->name('tanques-index')
            ->middleware('checkPermission:6')
        ;
        // delete
        Route::get('/delete/{id}', [TanqueController::class, 'destroy'])
            ->name('tanques-destroy')
            ->middleware('checkPermission:6')   
        ;
        // create
        Route::get('/create/{id}', [TanqueController::class, 'create'])
            ->name('tanques-create')
            ->middleware('checkPermission:6')
        ;
    });
});
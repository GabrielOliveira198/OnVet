<?php

use App\Http\Controllers\Cadastro\FuncionarioController;
use App\Http\Controllers\Cadastro\TanqueController;
use App\Http\Controllers\Cadastro\TeController;
use App\Http\Controllers\Cadastro\IatfController;
use App\Http\Controllers\Cadastro\InducaoController;

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
    
    Route::group(['prefix' => 'tes'], function () {
        // listagem
        Route::any('/', [TeController::class, 'index'])
            ->name('tes-index')
            ->middleware('checkPermission:8')
        ;
        // delete
        Route::get('/delete/{id}', [TeController::class, 'destroy'])
            ->name('tes-destroy')
            ->middleware('checkPermission:8')   
        ;
        // create
        Route::get('/create/{id}', [TeController::class, 'create'])
            ->name('tes-create')
            ->middleware('checkPermission:8')
        ;
    });

    Route::group(['prefix' => 'iatfs'], function () {
        // listagem
        Route::any('/', [IatfController::class, 'index'])
            ->name('iatfs-index')
            ->middleware('checkPermission:10')
        ;
        // delete
        Route::get('/delete/{id}', [IatfController::class, 'destroy'])
            ->name('iatfs-destroy')
            ->middleware('checkPermission:10')   
        ;
        // create
        Route::get('/create/{id}', [IatfController::class, 'create'])
            ->name('iatfs-create')
            ->middleware('checkPermission:10')
        ;
    });
    Route::group(['prefix' => 'inducoes'], function () {
        // listagem
        Route::any('/', [InducaoController::class, 'index'])
            ->name('inducoes-index')
            ->middleware('checkPermission:12')
        ;
        // delete
        Route::get('/delete/{id}', [InducaoController::class, 'destroy'])
            ->name('inducoes-destroy')
            ->middleware('checkPermission:12')   
        ;
        // create
        Route::get('/create/{id}', [InducaoController::class, 'create'])
            ->name('inducoes-create')
            ->middleware('checkPermission:12')
        ;
    });
});
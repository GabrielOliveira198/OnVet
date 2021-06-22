<?php

use App\Http\Controllers\TudoNutri\AnamneseController;
use App\Http\Controllers\TudoNutri\ManipuladosController;
use App\Http\Controllers\TudoNutri\MetasController;

Route::group(['prefix' => 'tudonutri'], function () {
    
    Route::group(['prefix' => 'anamnese'], function () {
        Route::any('/', [AnamneseController::class, 'index'])
            ->name('anamnese-index')
            ->middleware('checkPermission:26')
        ;
        Route::get('/delete/{id}', [AnamneseController::class, 'destroy'])
            ->name('anamnese-destroy')
            ->middleware('checkPermission:26')
        ;
        Route::get('/create/{id}', [AnamneseController::class, 'create'])
            ->name('anamnese-create')
            ->middleware('checkPermission:26')
        ;
    });

    Route::group(['prefix' => 'manipulados'], function () {
        Route::any('/', [ManipuladosController::class, 'index'])
            ->name('manipulados-index')
            ->middleware('checkPermission:29')
        ;
        Route::get('/delete/{id}', [ManipuladosController::class, 'destroy'])
            ->name('manipulados-destroy')
            ->middleware('checkPermission:29')
        ;
        Route::get('/create/{id}', [ManipuladosController::class, 'create'])
            ->name('manipulados-create')
            ->middleware('checkPermission:29')
        ;
    });
    
    Route::group(['prefix' => 'metas'], function () {
        Route::any('/', [MetasController::class, 'index'])
            ->name('metas-index')
            ->middleware('checkPermission:27')
        ;
        Route::get('/delete/{id}', [MetasController::class, 'destroy'])
            ->name('metas-destroy')
            ->middleware('checkPermission:27')
        ;
        Route::get('/create/{id}', [MetasController::class, 'create'])
            ->name('metas-create')
            ->middleware('checkPermission:27')
        ;
    });
});

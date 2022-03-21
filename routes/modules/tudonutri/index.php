<?php

use App\Http\Controllers\TudoNutri\MetasController;

Route::group(['prefix' => 'tudonutri'], function () {
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

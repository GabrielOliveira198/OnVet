<?php

use App\Http\Controllers\TudoNutri\AnamneseController;


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
});

<?php

use App\Http\Controllers\Duvida\FaqController;


Route::group(['prefix' => 'duvida'], function () {
    Route::group(['prefix' => 'faqs'], function () {
        Route::any('/', [FaqController::class, 'index'])
            ->name('faqs-index')
            ->middleware('checkPermission:12')
        ;
        Route::get('/delete/{id}', [FaqController::class, 'destroy'])
            ->name('faqs-destroy')
            ->middleware('checkPermission:12')
        ;
        Route::get('/create/{id}', [FaqController::class, 'create'])
            ->name('faqs-create')
            ->middleware('checkPermission:12')
        ;
    });
});

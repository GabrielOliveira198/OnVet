<?php

use App\Http\Controllers\Data\TudoNutri\AnamneseController;
use App\Http\Controllers\Data\TudoNutri\MetasController;

Route::group(['prefix' => 'tudonutri'], function () {
    Route::group(['prefix' => 'anamnese'], function () {
        Route::post('save', [AnamneseController::class, 'save']);
    });
    Route::group(['prefix' => 'metas'], function () {
        Route::post('save', [MetasController::class, 'save']);
    });
});

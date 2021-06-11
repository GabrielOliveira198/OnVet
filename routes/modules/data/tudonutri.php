<?php

use App\Http\Controllers\Data\TudoNutri\AnamneseController;

Route::group(['prefix' => 'tudonutri'], function () {
    Route::group(['prefix' => 'anamnese'], function () {
        Route::post('save', [AnamneseController::class, 'save']);
    });
});

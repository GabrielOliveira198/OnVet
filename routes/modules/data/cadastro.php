<?php

use App\Http\Controllers\Data\Cadastro\FuncionarioController;
use App\Http\Controllers\Data\Cadastro\TanqueController;

Route::group(['prefix' => 'cadastros'], function () {
    Route::group(['prefix' => 'funcionarios'], function () {
        Route::post('save', [FuncionarioController::class, 'save']);
    });
});

Route::group(['prefix' => 'cadastros'], function () {
    Route::group(['prefix' => 'tanques'], function () {
        Route::post('save', [TanqueController::class, 'save']);
    });
});


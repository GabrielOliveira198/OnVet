<?php

use App\Http\Controllers\Data\Cadastro\FuncionarioController;

Route::group(['prefix' => 'funcionarios'], function () {
    Route::group(['prefix' => 'funcionarios'], function () {
        Route::post('save', [FuncionarioController::class, 'save']);
    });
});


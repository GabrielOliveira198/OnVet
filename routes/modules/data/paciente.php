<?php

use App\Http\Controllers\Data\Paciente\PacienteController;

Route::group(['prefix' => 'paciente'], function () {
    Route::group(['prefix' => 'pacientes'], function () {
        Route::post('save', [PacienteController::class, 'save']);
    });
});

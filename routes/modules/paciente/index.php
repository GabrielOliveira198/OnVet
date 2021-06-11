<?php

use App\Http\Controllers\Paciente\PacienteController;

Route::group(['prefix' => 'paciente'], function () {
    Route::group(['prefix' => 'pacientes'], function () {
        Route::any('/', [PacienteController::class, 'index'])
            ->name('paciente-index')
            ->middleware('checkPermission:24')
        ;
        Route::get('/delete/{id}', [PacienteController::class, 'destroy'])
            ->name('paciente-destroy')
            ->middleware('checkPermission:24')
        ;
        Route::get('/create/{id}', [PacienteController::class, 'create'])
            ->name('paciente-create')
            ->middleware('checkPermission:24')
        ;
    });
});

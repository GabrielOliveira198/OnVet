<?php

use App\Http\Controllers\Data\Security\AuditLogController;
use App\Http\Controllers\Data\Security\RoleController;

Route::group(['prefix' => 'security'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('{id}/audits', [AuditLogController::class, 'index']);
    });

    Route::group(['prefix' => 'role'], function () {
        Route::post('/save', [RoleController::class, 'save']);
    });
});

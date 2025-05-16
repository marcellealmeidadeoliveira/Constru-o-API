<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\http\Controllers\RemediosController;

Route::middleware('api')->group(function () {
    Route::get('/remedios', [RemediosController::class, 'index']);

    Route::get('/remedios/{id}', [RemediosController::class, 'show']);

    Route::post('/remedios', [RemediosController::class, 'store']);

    Route::put('/remedios/{id}', [RemediosController::class, 'update']);
    
    Route::delete('/remedios/{id}', [RemediosController::class, 'destroy']);
});

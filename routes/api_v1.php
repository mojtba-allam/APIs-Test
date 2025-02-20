<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Ticket;
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\AuthorsController;
use App\Http\Controllers\Api\V1\AuthorTicketsController;

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('tickets', TicketController::class)->except('update');
    Route::put('tickets/{ticket}', [TicketController::class,'replace']);

    Route::apiResource('authors', AuthorsController::class);
    Route::apiResource('authors.tickets', AuthorTicketsController::class);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});


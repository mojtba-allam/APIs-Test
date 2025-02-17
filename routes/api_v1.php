<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Ticket;
use App\Http\Controllers\Api\V1\TicketController;

Route::apiResource('tickets', TicketController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

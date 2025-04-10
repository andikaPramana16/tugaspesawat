<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;

Route::get("/", function(){
    return redirect('flights');
} );
Route::get('/flights', [FlightController::class, 'index']);
Route::get('/flights/book/{flight}', [FlightController::class, 'book']);
Route::get('/flights/ticket/{flight}', [FlightController::class, 'tickets']);


Route::post('/ticket/submit', [TicketController::class, 'store']);
Route::put('/ticket/board/{id}', [TicketController::class, 'board'])->name('tickets.board');
Route::delete('/ticket/delete/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

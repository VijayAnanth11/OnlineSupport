<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketListController;


Route::get('/', [TicketController::class, 'index']);

Route::resource('/AgentLogin', LoginController::class);
Route::resource('/AddTicket', TicketController::class);
Route::resource('/AgentTicket', TicketListController::class);

Route::post('postadminlogin', [LoginController::class, 'postadminlogin'])->name('postadminlogin');
Route::get('UpdateTicket/{id}', [TicketListController::class,'edit']);
Route::get('/SearchRef', [TicketController::class, 'searchRef']);
Route::get('/SearchCus', [TicketListController::class, 'searchCus']);
Route::get('ViewTicket/{id}', [TicketController::class,'view']);

Route::get('send-mail', [TicketController::class, 'sendMail']);
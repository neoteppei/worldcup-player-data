<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlayerController::class, 'index'])->name('players');

Route::get('/player/{id}', [PlayerController::class, 'detail'])->name('show');
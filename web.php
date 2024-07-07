<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('players/index');
});
// 選手一覧を表示
Route::get('/', [PlayerController::class, 'index'])->name('plyaers');

// 選手詳細表示
Route::get('/player/{id}', [PlayerController::class, 'detail'])->name('show');

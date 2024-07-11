<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('players/index');
});
// 選手一覧を表示
Route::get('/', [PlayerController::class, 'index'])->name('player.index');

// 選手詳細表示
Route::get('/player/{id}', [PlayerController::class, 'detail'])->name('show');

Route::delete('/player/delete/{id}', [PlayerController::class, 'delete'])->name('player.delete');

Route::get('/players/{id}/edit', [PlayerController::class, 'edit'])->name('player.edit');
Route::put('/players/{id}', [PlayerController::class, 'update'])->name('player.update');

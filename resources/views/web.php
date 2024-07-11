<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ホームページとしてプレイヤー一覧を表示
Route::get('/', [PlayerController::class, 'index'])->name('players');

// 選手詳細表示
Route::get('/player/{id}', [PlayerController::class, 'detail'])->name('show');
<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// ホームページへのルート
Route::get('/', [PlayerController::class, 'index'])->name('player.index');

// 選手詳細表示
Route::get('/player/{id}', [PlayerController::class, 'detail'])->name('player.detail');

// 認証が必要なルートグループ
Route::middleware('auth')->group(function () {
    Route::middleware('role:0')->group(function () { // 管理ユーザーのロールを0と仮定
        Route::delete('/player/delete/{id}', [PlayerController::class, 'delete'])->name('player.delete');
        Route::get('/players/{id}/edit', [PlayerController::class, 'edit'])->name('player.edit');
        Route::put('/players/{id}', [PlayerController::class, 'update'])->name('player.update');
    });

    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

// 認証関連ルート
Auth::routes();

// 新規登録ルート
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// ログイン後のホーム画面
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
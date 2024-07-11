<<<<<<< HEAD
<?php

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

Route::get('/', function () {
    return view('index');
});
=======
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
>>>>>>> 04a1a7bf2af2daf13de46401cdf7ccb53c151cf2

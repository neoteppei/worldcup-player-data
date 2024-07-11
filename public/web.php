<<<<<<< HEAD
<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlayerController::class, 'index'])->name('players');

=======
<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlayerController::class, 'index'])->name('players');

>>>>>>> 04a1a7bf2af2daf13de46401cdf7ccb53c151cf2
Route::get('/player/{id}', [PlayerController::class, 'detail'])->name('show');
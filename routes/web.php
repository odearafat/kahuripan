<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BantuanController;

Route::get('/', [BantuanController::class, 'index']);
Route::post('/cari', [BantuanController::class, 'cari'])->name('bantuan.cari');
// Route::get('/', function () {
//     return view('welcome');
// });

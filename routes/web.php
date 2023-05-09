<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CsvController;
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
    return view('welcome');
});

Route::get('/dashboard', [ProductController::class, 'showAllProduct'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 以下練習用コード
Route::post('/save', [ProductController::class, 'create'])->name('product.create');
Route::post('/dashboard/update', [ProductController::class, 'update']);
Route::post('/dashboard/delete', [ProductController::class, 'delete']);

// csvインポート
Route::get('/get_csv', [CsvController::class, 'create']);

// csv書き出し
Route::get('/csv_upload_form', [CsvController::class, 'show'])->middleware(['auth', 'verified'])->name('show');
Route::post('/csv_upload', [CsvController::class, 'store'])->middleware(['auth', 'verified'])->name('store');

// カレンダー
Route::get('/calendar', [CalendarController::class, 'show'])->name('show.calendar');

require __DIR__.'/auth.php';

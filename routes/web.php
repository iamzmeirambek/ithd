<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CategoryController::class, 'index']);

Route::prefix('categories')->name('categories.')->group(function () {
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::put('{category}', [CategoryController::class, 'update'])->name('update');
    Route::delete('{category}', [CategoryController::class, 'destroy'])->name('destroy');
    Route::post('reorder', [CategoryController::class, 'reorder'])->name('reorder');
});



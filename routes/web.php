<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/category', function () {
//     return view('category-page.category');
// })->middleware(['auth'])->name('category');

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/add', [CategoryController::class, 'create']);
Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
Route::get('/category/{id}/delete', [CategoryController::class, 'destroy']);
Route::post('/category', [CategoryController::class, 'store']);
// Route::put('/category/{id}', [CategoryController::class, 'update']);

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('home');
// });
Auth::routes();
Route::middleware(['auth:sanctum', 'verified'])->get('/', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth:sanctum', 'verified'])->get('/generos', [GeneroController::class, 'index'])->name('generos');
Route::middleware(['auth:sanctum', 'verified'])->get('/categorias', [CategoriasController::class, 'index'])->name('categorias');
Route::middleware(['auth:sanctum', 'verified'])->get('/SubCategorias', [SubCategoriaController::class, 'index'])->name('subCategorias');
//RUTA QUE DESTRUYE LA SESION
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

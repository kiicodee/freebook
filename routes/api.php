<?php

use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\UserController;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [UserController::class, 'Register']);
Route::post('login', [UserController::class, 'Login']);



Route::get('kategori',[KategoriController::class, 'index']);
Route::post('kategori',[KategoriController::class, 'store']);
Route::post('kategori/{id}',[KategoriController::class, 'update']);
Route::delete('kategori/{id}',[KategoriController::class, 'destroy']);



Route::get('buku',[BukuController::class, 'index']);
Route::post('buku',[BukuController::class, 'store']);
Route::get('buku/{id}',[BukuController::class, 'show']);


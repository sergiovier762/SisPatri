<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;



Route::post('usuarios', [UsuarioController::class, 'store']);
Route::post('usuarios/create', [UsuarioController::class, 'create']);
Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::put('usuarios/{usuario}', [UsuarioController::class, 'update']);
Route::delete('usuarios/{id}', [UsuarioController::class, 'destroy']);
Route::get('usuarios', [UsuarioController::class, 'index']);
Route::get('usuarios/{usuario}', [UsuarioController::class, 'show']);
Route::get('usuarios/search', [UsuarioController::class, 'search']);

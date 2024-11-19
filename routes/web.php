<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministracaoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Rotas de autenticação
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/senha', [LoginController::class, 'senha'])->name('senha');
Route::get('/usuario', [LoginController::class, 'usuario'])->name('usuario');
Route::get('/principal', [LoginController::class, 'index'])->name('principal');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/Administracao', [AdministracaoController::class, 'index'])->name('Administracao');
    Route::post('/sair', [LoginController::class, 'sair'])->name('sair');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios');
        Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    });

    Route::get('/usuarios', [UsuarioController::class, 'index'])
        ->middleware('permission:view-users')
        ->name('usuarios.index');
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios');
    Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    Route::get('usuarios/search', [UsuarioController::class, 'search'])->name('usuarios.search');
    Route::get('/usuario', [UsuarioController::class, 'showUserPermissions'])->name('showUserPermissions');
    Route::post('/usuario', [UsuarioController::class, 'updateUserPermissions'])->name('updateUserPermissions');
    Route::get('/assign-role/{userId}', [UsuarioController::class, 'assignRoleToUser'])->name('assignRoleToUser');

    Route::get('produtos', [ProdutoController::class, 'index'])->name('produtos');
    Route::get('produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
    Route::get('produtos/search', [ProdutoController::class, 'search'])->name('produtos.search');
    Route::get('/produtos/duplicate/{id}', [ProdutoController::class, 'duplicate'])->name('produtos.duplicate');

    Route::get('fornecedores', [FornecedorController::class, 'index'])->name('fornecedores');
    Route::get('fornecedores/create', [FornecedorController::class, 'create'])->name('fornecedores.create');
    Route::post('fornecedores', [FornecedorController::class, 'store'])->name('fornecedores.store');
    Route::get('fornecedores/{id}/edit', [FornecedorController::class, 'edit'])->name('fornecedores.edit');
    Route::put('fornecedores/{id}', [FornecedorController::class, 'update'])->name('fornecedores.update');
    Route::delete('fornecedores/{id}', [FornecedorController::class, 'destroy'])->name('fornecedores.destroy');
    Route::get('fornecedores/search', [FornecedorController::class, 'search'])->name('fornecedores.search');

    Route::get('salas', [SalaController::class, 'index'])->name('salas');
    Route::get('salas/create', [SalaController::class, 'create'])->name('salas.create');
    Route::post('salas', [SalaController::class, 'store'])->name('salas.store');
    Route::get('salas/{id}/edit', [SalaController::class, 'edit'])->name('salas.edit');
    Route::put('salas/{id}', [SalaController::class, 'update'])->name('salas.update');
    Route::delete('salas/{id}', [SalaController::class, 'destroy'])->name('salas.destroy');
    Route::get('salas/search', [SalaController::class, 'search'])->name('salas.search');
});
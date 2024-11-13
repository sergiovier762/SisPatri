<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'fornecedores',
        'produtos',
        'salas',
        'notas',
        'relatorios',
        'Administracao',
        'sair',
        'principal',
        'login',
        'senha',
        'usuario',
        'usuarios',
        'produtos/create',
        'fornecedores/create',
        'salas/create',
        'usuarios/create',
        'produtos/destroy',
        'fornecedores/destroy',
        'salas/destroy',
        'usuarios/destroy',
        'produtos/update',
        'fornecedores/update',
        'salas/update', 
        'usuarios/update',
    ];
}

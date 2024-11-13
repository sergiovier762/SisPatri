<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('Principal');
    }
    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'senha' => 'required',
        ]);
 
        $user = \App\Models\User::where('usuario', $request->usuario)->first();
 
        if ($user) {
            Auth::login($user);
            return redirect()->route('Administracao');
        } else {
            return redirect()->route('login')->withErrors(['login' => 'Credenciais inválidas']);
        }
    }
    public function usuario(Request $request)
    {
        return view('Usuario');
    }
    public function senha(Request $request)
    {
        return view('Senha');
    }

    public function sair(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

}
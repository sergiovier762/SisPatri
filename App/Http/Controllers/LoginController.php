<?php

namespace app\Http\Controllers;

use app\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

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

        $user = \app\Models\User::where('usuario', $request->usuario)->first();

        if ($user && Hash::check($request->senha, $user->senha)) {
            Auth::login($user);
            return redirect()->route('Administracao'); // Ajuste para a rota de administração
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
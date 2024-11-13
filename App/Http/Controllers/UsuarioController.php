<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('Usuario', compact('usuarios'));
    }

    public function create()
    {
        return view('CadUsu');
    }

    public function store(Request $request) 
{
    $request->validate([
        'name' => 'required|string|max:255',
        'usuario' => 'required|string|max:255|unique:users',
        'senha' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $request->input('name'),
        'usuario' => $request->input('usuario'),
        'senha' => bcrypt($request->input('senha')),
    ]);

    return redirect()->route('usuarios.create')
                         ->with('success', 'Usuário criado com sucesso.')
                         ->with('popup', true);
}

    public function show(User $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(User $usuario)
    {
        return view('usuarios.update', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'usuario' => 'required|string|max:255|unique:users,usuario,' . $usuario->id,
            'senha' => 'nullable|string|min:8',
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios')
                         ->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(string $id){
        $usuario = User::find($id);

        if($usuario){
            $usuario->delete();
            return redirect()->route('usuarios')->with('success', 'Usuário excluído com sucesso!');
        } else {
            return redirect()->route('usuarios')->with('error', 'Não foi possível encontrar o Usuário!');
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $usuarios = User::where('name', 'LIKE', "%{$query}%")->get();
 
        return view('Usuario', compact('usuarios'));
    }  
    
}

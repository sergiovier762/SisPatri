<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controller;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = User::all();
        $allPermissions = Permission::all();
        dd($allPermissions);
        return view('Usuario', compact('usuarios', 'allPermissions'));
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

        $user->assignRole('user');

        return redirect()->route('usuarios')
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

        $data = $request->only(['name', 'usuario']);
        if ($request->filled('senha')) {
            $data['senha'] = bcrypt($request->input('senha'));
        }

        $usuario->update($data);

        return redirect()->route('usuarios')
                         ->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        $usuario = User::find($id);

        if ($usuario) {
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

    public function showUserPermissions()
    {
        $users = User::all();
        $permissions = Permission::all();

        return view('Usuario', compact('users', 'permissions'));
    }

    public function updatePermissions(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->syncPermissions($request->input('permissions', [])); // Sincroniza as permissões

        return redirect()->route('usuarios')->with('success', 'Permissões atualizadas com sucesso.');
    }

    public function assignRoleToUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->assignRole('user');
            return "Papel atribuído com sucesso!";
        }

        return "Usuário não encontrado.";
    }
}
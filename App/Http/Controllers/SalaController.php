<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sala;

class SalaController extends Controller
{
    public function index()
    {
        $salas = Sala::all();   
        $salasCount = $salas->count();
        return view('Sala', compact('salas', 'salasCount'));
    }

    public function create()
    {
        return view('CadSala');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'unidade' => 'required|string|max:255',
            'bloco' => 'required|string|max:255',
        ]);

        Sala::create($request->all());

        return redirect()->route('salas.create')
                         ->with('success', 'Sala criada com sucesso.')
                         ->with('popup', true);
    }

    public function show(Sala $sala)
    {
        return view('salas.show', compact('sala'));
    }

    public function edit(string $id)
    {
        $sala = Sala::find($id);

        if (!$sala) {
            return redirect()->route(' salas.index')->with('error', 'Sala não encontrada.');
        }

        $salas = Sala::all();

        return view('UpdSala', compact('sala', 'salas'));
    }

    public function update(Request $request, Sala $sala)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'unidade' => 'required|string|max:255',
            'bloco' => 'required|string|max:255',
        ]);

        $sala->update($request->all());

        return redirect()->route('salas')
                         ->with('success', 'Sala atualizada com sucesso.');
    }

    public function destroy(string $id){
        $sala = Sala::find($id);

        if($sala){
            $sala->delete();
            return redirect()->route('salas')->with('success', 'Sala excluída com sucesso!');
        } else {
            return redirect()->route('salas')->with('error', 'Não foi possível encontrar a Sala!');
        }
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $salas = Sala::where('nome', 'LIKE', "%{$query}%")->get();
 
        return view('Sala', compact('salas'));
    } 
}

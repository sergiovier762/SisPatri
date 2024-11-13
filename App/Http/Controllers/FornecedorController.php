<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::all();  
        $fornecedoresCount = $fornecedores->count();
        return view('Fornecedor', compact('fornecedores', 'fornecedoresCount'));
    }

    public function create()
    {
        return view('CadForn');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18',
            'endereco' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:15',
        ]);

        $data = $request->all();
        $data['cnpj'] = $this->formatCNPJ($data['cnpj']);

        Fornecedor::create($data);

        return redirect()->route('fornecedores.create')
                         ->with('success', 'Fornecedor criado com sucesso.');
    }

    public function show(Fornecedor $fornecedor)
    {
        return view('fornecedores.show', compact('fornecedor'));
    }

    public function edit(string $id)
    {
        $fornecedor = Fornecedor::find($id);

        if (!$fornecedor) {
            return redirect()->route('fornecedores.index')->with('error', 'Fornecedor não encontrado.');
        }

        $fornecedores = Fornecedor::all();

        return view('UpdForn', compact('fornecedor', 'fornecedores'));
    }

    public function update(Request $request, Fornecedor $fornecedor)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18',
            'endereco' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:15',
        ]);

        $data = $request->all();
        $data['cnpj'] = $this->formatCNPJ($data['cnpj']);

        $fornecedor->update($data);

        return redirect()->route('fornecedores.index')
                         ->with('success', 'Fornecedor atualizado com sucesso.');
    }

    public function destroy(string $id){
        $fornecedor = Fornecedor::find($id);

        if($fornecedor){
            $fornecedor->delete();
            return redirect()->route('fornecedores')->with('success', 'Fornecedor excluído com sucesso!');
        } else {
            return redirect()->route('fornecedores')->with('error', 'Não foi possível encontrar o Fornecedor!');
        }
    }

    private function formatCNPJ($cnpj)
    {
        // Formata o CNPJ para o formato 00.000.000/0000-00
        return preg_replace("/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/", "$1.$2.$3/$4-$5", $cnpj);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $fornecedores = Fornecedor::where('nome', 'LIKE', "%{$query}%")->get();
 
        return view('Fornecedor', compact('fornecedores'));
    }   
}

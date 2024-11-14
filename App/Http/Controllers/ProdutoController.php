<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Sala;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function create()
    {
        $salas = Sala::all();
        $fornecedores = Fornecedor::all();
        return view('CadProd', compact('salas', 'fornecedores'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'nome' => ['required'],
            'descricao' => ['required'],
            'preco' => ['required', 'numeric'],
            'sala_id' => ['required', 'exists:salas,id'],
            'fornecedor_id' => ['required', 'exists:fornecedores,id'],
            'numero_fatura' => ['required'],
            'numero_patrimonio' => ['required', 'unique:produtos,numero_patrimonio'],
            'data_aquisicao' => ['required', 'date']
        ], [
            'numero_patrimonio.unique' => 'O número de patrimônio já existe.',
        ]);

        $produto = Produto::create($input);
        return redirect()->route('produtos.create')->with('success');
    }

    public function index(Request $request)
    {
        $sort = $request->get('sort', 'nome');
        $direction = $request->get('direction', 'asc');

        $produtos = Produto::orderBy($sort, $direction)->get();

        return view('Produto', compact('produtos', 'sort', 'direction'));
    }

    public function destroy(string $id)
    {
        $produto = Produto::find($id);

        if ($produto) {
            $produto->delete();
            return redirect()->route('produtos')->with('success', 'Produto excluído com sucesso!');
        } else {
            return redirect()->route('produtos')->with('error', 'Não foi possível encontrar o Produto!');
        }
    }

    public function edit(string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return redirect()->route('produtos.index')->with('error', 'Produto não encontrado.');
        }

        $salas = Sala::all();
        $fornecedores = Fornecedor::all();

        return view('UpdProd', compact('produto', 'salas', 'fornecedores'));
    }

    public function update(Request $request, string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return redirect()->route('produtos.index')->with('error', 'Produto não encontrado.');
        }

        $input = $request->validate([
            'nome' => ['required'],
            'descricao' => ['required'],
            'preco' => ['required', 'numeric'],
            'sala_id' => ['required', 'exists:salas,id'],
            'fornecedor_id' => ['required', 'exists:fornecedores,id'],
            'numero_fatura' => ['required'],
            'numero_patrimonio' => ['required', 'unique:produtos,numero_patrimonio,' . $produto->id],
            'data_aquisicao' => ['required', 'date']
        ], [
            'numero_patrimonio.unique' => 'O número de patrimônio já existe.',
        ]);

        if ($produto->update($input)) {
            return redirect()->route('produtos')->with('success', 'Produto atualizado com sucesso.');
        } else {
            return redirect()->route('produtos')->with('error', 'Não foi possível atualizar o produto.');
        }
    }

    public function show(string $id)
    {
        $produto = Produto::with(['sala', 'fornecedor'])->find($id);

        if ($produto) {
            return response()->json([
                'Mensagem: ' => 'Produto encontrado.',
                'Produto: ' => $produto
            ], 200);
        } else {
            return response()->json([
                'Mensagem: ' => 'Não foi possível encontrar o produto.',
            ], 500);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $produtos = Produto::where('nome', 'LIKE', "%{$query}%")->get();

        return view('Produto', compact('produtos'));
    }
}

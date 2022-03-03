<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $model;

    public function __construct(Produto $model){
        $this->model = $model;
    }

    public function index()
    {
        $produtos = Produto::paginate(5);

        return response()->json($produtos);
    }

    public function store(ProdutoRequest $request)
    {
        $produto = Produto::create($request->all());
        return response()->json([
            'code' => 200,
            'msg' => 'Produto inserido com sucesso'
        ]);
    }

    public function show($id)
    {

        $produto = Produto::findOrFail($id);

        if(!$produto){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }
        return response()->json($produto);
    }

    public function update(ProdutoRequest $request, $id)
    {
        $produto = Produto::find($id);
        if(!$produto){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }

        $produto->update($request->all());
        return response()->json([
            'code' => 200,
            'msg' => 'Produto alterado com sucesso'
        ]);
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);

        if(!$produto){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }

        $produto->delete();
        return response()->json([
            'code' => 200,
            'msg' => 'Produto removido com sucesso'
        ]);
    }
}

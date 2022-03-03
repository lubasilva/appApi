<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnidadeRequest;
use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    private $model;

    public function __construct(Unidade $model){
        $this->model = $model;
    }

    public function index()
    {
        $unidades = Unidade::paginate(5);

        return response()->json($unidades);
    }

    public function store(UnidadeRequest $request)
    {
        $unidade = Unidade::create($request->all());
        return response()->json([
            'code' => 200,
            'msg' => 'unidade inserido com sucesso'
        ]);
    }

    public function show($id)
    {

        $unidade = Unidade::findOrFail($id);

        if(!$unidade){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }
        return response()->json($unidade);
    }

    public function update(UnidadeRequest $request, $id)
    {
        $unidade = Unidade::find($id);
        if(!$unidade){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }

        $unidade->update($request->all());
        return response()->json([
            'code' => 200,
            'msg' => 'unidade alterado com sucesso'
        ]);
    }

    public function destroy($id)
    {
        $unidade = Unidade::find($id);

        if(!$unidade){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }

        $unidade->delete();
        return response()->json([
            'code' => 200,
            'msg' => 'unidade removida com sucesso'
        ]);
    }
}

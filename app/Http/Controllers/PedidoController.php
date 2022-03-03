<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    private $model;

    public function __construct(Pedido $model){
        $this->model = $model;
    }

    public function index()
    {
        $pedidos = Pedido::paginate(5);

        return response()->json($pedidos);
    }

    public function store(PedidoRequest $request)
    {
        $pedido = Pedido::create($request->all());
        return response()->json([
            'code' => 200,
            'msg' => 'pedido inserido com sucesso'
        ]);
    }

    public function show($id)
    {

        $pedido = Pedido::findOrFail($id);

        if(!$pedido){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }
        return response()->json($pedido);
    }

    public function update(PedidoRequest $request, $id)
    {
        $pedido = Pedido::find($id);
        if(!$pedido){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }

        $pedido->update($request->all());
        return response()->json([
            'code' => 200,
            'msg' => 'pedido alterado com sucesso'
        ]);
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);

        if(!$pedido){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }

        $pedido->delete();
        return response()->json([
            'code' => 200,
            'msg' => 'pedido removido com sucesso'
        ]);
    }

}

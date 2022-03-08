<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\PedidoDeVenda;
use Illuminate\Http\Request;

class PedidoDeVendaController extends Controller
{
    private $model;

    public function __construct(PedidoDeVenda $model){
        $this->model = $model;
    }

    public function index()
    {
        $pedidos = Cliente::where('id', 'id_cliente')->get();

        return response()->json($pedidos);
    }

    public function show($id) {

        $pedido = PedidoDeVenda::find($id);

        if(!$pedido){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }
        return response([
            'pedido' => [$pedido->pedido],
            'cliente' => [$pedido->cliente],
            'unidade' => [$pedido->unidade],
            'produtos' => [$pedido->produto],
        ]);
    }
}

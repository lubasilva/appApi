<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
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

        // dd($pedido->pedido->produtos->toArray());

        if(!$pedido){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }

        $referencia = $pedido->pedido->referencia;

        return response()->json([
            'pedido' => [
                'codigo' => $pedido->pedido->codigo,
                'data' => $pedido->pedido->data,
                'referencia' => $referencia],
            'cliente' => [$pedido->pedido->cliente],
            'unidade' => [$pedido->pedido->unidade],
            'produtos' => [$pedido->pedido->produtos],
        ]);
    }
}

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

        $codigoPedido = $id;

        if(!$pedido){
            return response()->json([
                'codigo' => 4,
                'mensagem' => "Pedido $codigoPedido NÃO FATURADO"
            ]);
        }

        $referencia = $pedido->pedido->referencia;

            $data = $pedido->pedido_data;
            $data = date("Y-m-d");
            
        return response()->json([
            'pedido' => [
                'codigo' => $pedido->pedido->codigo,
                'data' => $data,
                'referencia' => $referencia],
            'cliente' => $pedido->pedido->cliente,
            'unidade' => $pedido->pedido->unidade,
            'produtos' => $pedido->pedido->produtos,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $model;

    public function __construct(Cliente $model){
        $this->model = $model;
    }

    public function index()
    {
        $clientes = Cliente::paginate(5);

        return response()->json($clientes);
    }

    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());
        return response()->json([
            'code' => 200,
            'msg' => 'Cadastro inserido com sucesso'
        ]);
    }

    public function show($idcurso)
    {

        $cliente = Cliente::findOrFail($idcurso);

        if(!$cliente){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }
        return response()->json($cliente);
    }

    public function update(ClienteRequest $request, $id)
    {
        $cliente = Cliente::find($id);
        if(!$cliente){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }
        $cliente->update($request->all());
        return response()->json([
            'code' => 200,
            'msg' => 'Cadastro alterado com sucesso'
        ]);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if(!$cliente){
            return response()->json([
                'code' => 500,
                'msg' => 'Não foi possivel encontrar o id fornecido'
            ]);
        }
        $cliente->delete();
        return response()->json([
            'code' => 200,
            'msg' => 'Cadastro removido com sucesso'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportController extends Controller
{


    public function index(Request $request)
    {

        file_put_contents('dados.json', json_encode($request->all()).PHP_EOL, FILE_APPEND);
        file_put_contents('dados.txt', json_encode($request->all()).PHP_EOL, FILE_APPEND);

        if(!$request) {
            return response()->json([
                "status" => "OK",
                'dados' => $request->all()
            ]);
        }


    }

    public function store(Request $request)
    {
        file_put_contents('dados.json','ERRO: '.  json_encode($request->all()).PHP_EOL, FILE_APPEND);

        if(!$request) {
            return response([
                "status" => "ERRO",
                "codigo" => 2,
                "mensagem" => "Pedido não localizado",
        ]);
        }
        
        file_put_contents('dados.json', json_encode($request->all()).PHP_EOL, FILE_APPEND);
        file_put_contents('dados.txt', json_encode($request->all()).PHP_EOL, FILE_APPEND);
        return response([
            "status" => "OK"
        ]);

    }

    public function show(Request $request, $id)
    {

        file_put_contents('dados.json', json_encode($request->all()).PHP_EOL, FILE_APPEND);
        file_put_contents('dados.txt', json_encode($request->all()).PHP_EOL, FILE_APPEND);

        if(!$request) {
            return response()->json([
                "status" => "OK",
                'dados' => $request->all()
            ]);
        }
    }

    public function update(Request $request)
    {
        file_put_contents('dados.json','ERRO: '.  json_encode($request->all()).PHP_EOL, FILE_APPEND);

        if(!$request) {
            return response([
                "status" => "ERRO",
                "codigo" => 2,
                "mensagem" => "Pedido não localizado",
        ]);
        }
        
        file_put_contents('dados.json', json_encode($request->all()).PHP_EOL, FILE_APPEND);
        file_put_contents('dados.txt', json_encode($request->all()).PHP_EOL, FILE_APPEND);
        return response([
            "status" => "OK"
        ]);

    }

}
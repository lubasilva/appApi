<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{

    const BASE_URL = "";
    const HMAC_VERSION = 1;
    const CLINTID = 0;
    const WEBSERVICEKEY = '';
    const VIDEOCONFERENCIAKEY = '';

    public function importarPedido() {
        $base_url = 'https://crm-dev.lab.ca.inf.br';
        $uri = "{$base_url}/videoconferencia-api/importar-pedido";
        $method = 'POST';
        $hmacVersion = 1;
        $clientId = 0;

        $mensagem = array(
            'pedido' => 'referenceCode',
        );

        $m = json_encode($mensagem);

        $ds = $method . $uri . $m;

        $key = 'CHAVESECRETAAPI';
        $nonce = time();
        $hkey = $nonce . $key;
        $hmac = hash('sha256', hash('sha256', $hkey) . hash('sha256', $hkey . $ds));

        $headers = [
            'Content-type' => 'application/json',
            'HMAC-Authentication' => $hmacVersion . ':' . $clientId . ':' . $nonce . ':' . $hmac
        ];

        $client = new Client([
            'headers' => $headers,
            'verify' => false,
            'base_uri' => $uri
        ]);

        
        // var_dump(openssl_get_cert_locations());
        // echo file_get_contents("/usr/lib/ssl/cert.pem");
        

        $response = $client->post($uri, [$mensagem]);

        echo $response->getBody();

        // $produtos = json_decode($response->getBody(),true)['data']['produtos'];
    }

    public function novaSolicitacao() {
        $base_url = 'https://crm-dev.lab.ca.inf.br';
        $uri = "{$base_url}/videoconferencia-api/nova-solicitacao";
        $method = "POST";
        $hmacVersion = 1;
        $clientId = 0;

        $mensagem = array(
            'pedido' => 'referenceCode',
            'cliente' => array(
                'nome' => 'ANGELINA OLSON',
                'email' => 'beatty.orland@jast.info',
                'telefone' => '62999999999',
                'cpf' => '62592377077',
                'cnpj' => '',
                'cnh' => '',
                'senha' => '',
            ),
            'municipio' => array(
                'codigo' => '5208707'
            ),
            'produto' => 'COLOCAR PRODUTO AQUI'
        );

        $m = json_encode($mensagem);

        $ds = $method . $uri . $m;

        $key = 'CHAVESECRETAAPI';
        $nonce = time();
        $hkey = $nonce . $key;
        $hmac = hash('sha256', hash('sha256', $hkey) . hash('sha256', $hkey . $ds));

        $headers = [
            'Content-type' => 'application/json',
            'HMAC-Authentication' => $hmacVersion . ':' . $clientId . ':' . $nonce . ':' . $hmac
        ];

        $client = new Client([
            'headers' => $headers,
            'uri' => $uri
        ]);


        $response = $client->post($uri, [$mensagem]);

        echo $response->getBody();

    }

    public function horarioDisponivel() {
        $base_url = 'https://crm-dev.lab.ca.inf.br';
        $uri = "{$base_url}/videoconferencia-api/horarios-disponiveis-videoconferencia";
        $method = 'POST';
        $hmacVersion = 1;
        $clientId = 0;

        $mensagem = array(
            'dataAgendamento' => '2022-03-24',
            'protocolo' => '22714-25'
        );

        $m = json_encode($mensagem);

        $ds = $method . $uri . $m;

        $key = 'CHAVESECRETAAPI';
        $nonce = time();
        $hkey = $nonce . $key;
        $hmac = hash('sha256', hash('sha256', $hkey) . hash('sha256', $hkey . $ds));

        $headers = [
            'Content-type' => 'application/json',
            'HMAC-Authentication' => $hmacVersion . ':' . $clientId . ':' . $nonce . ':' . $hmac
        ];

        $client = new Client([
            'headers' => $headers,
            'uri' => $uri
        ]);

        $response = $client->post($uri, [$mensagem]);

        echo $response->getBody();

    }

    public function agendamento() {
        $base_url = "https://crm-dev.lab.ca.inf.br";
        //DUVIDAS
        $uri = "{$base_url}/videoconferencia-api/importar-pedido"; //ESTE LINK E O MEU DE IMPORTAÇÃO?
        $method = 'POST';
        $hmacVersion = 1;
        $clientId = 0;

        $mensagem = array(
            "pedido" => "15"
        );

        $m = json_encode($mensagem);

        $ds = $method . $uri . $m;

        $key = "CHAVESECRETAAPI";
        $nonce = time();
        $hkey = $nonce . $key;
        $hmac = hash('sha256', hash('sha256', $hkey) . hash('sha256', $hkey . $ds));

        $headers = [
            'Content-type' => 'application/json',
            'HMAC-Authentication' => $hmacVersion . ':' . $clientId . ':' . $nonce . ':' . $hmac
        ];



        $client = new Client([
            'headers' => $headers,
            'uri' => $uri
        ]);

        $response = $client->post($uri, [$mensagem]);

        echo $response->getBody();
    }

    public function importarDocumentos() {
        $base_url = 'https://crm-dev.lab.ca.inf.br';
        $uri = "{$base_url}/videoconferencia-api/importar-documentos";
        $method = 'POST';
        $hmacVersion = 1;
        $clientId = 0;
        $mensagem = array(
        'protocolo' => '22714-25',
        'senha' => 'SoLuTI@123',
        'docs' => array(
            array(
            'name' => 'CNH',
            'extensao' => '.jpeg',
            'file' => base64_encode(file_get_contents('CNH.jpeg'))
            ),
            array(
            'name' => 'RG',
            'extensao' => '.jpeg',
            'file' => base64_encode(file_get_contents('RG.jpeg'))
            )
        )
        );

        $m = json_encode($mensagem);

        $ds = $method . $uri . $m;

        $key = 'CHAVESECRETAAPI';
        $nonce = time();
        $hkey = $nonce . $key;
        $hmac = hash('sha256', hash('sha256', $hkey) . hash('sha256', $hkey . $ds));

        $headers = [
        'Content-type' => 'application/json',
        'HMAC-Authentication' => $hmacVersion . ':' . $clientId . ':' . $nonce . ':' . $hmac
        ];

        $client = new Client([
            'headers' => $headers,
            'uri' => $uri
        ]);


        $response = $client->post($uri, $mensagem);

        echo $response->getBody();
    }
}

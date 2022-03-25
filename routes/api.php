<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoDeVendaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\ExportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/pedidos', PedidoController::class);
Route::apiResource('/clientes', ClienteController::class);
Route::apiResource('/unidades', UnidadeController::class);
Route::apiResource('/produtos', ProdutoController::class);
Route::apiResource('/pedido', PedidoDeVendaController::class);

Route::apiResource('/exportar/pedido', ExportController::class);

Route::get('/importarPedido', [AgendamentoController::class, 'importarPedido']);
Route::get('/novaSolicitacao', [AgendamentoController::class, 'novaSolicitacao']);
Route::get('/horariosDisponiveis', [AgendamentoController::class, 'horarioDisponivel']);
Route::get('/agendarVideoConferencia', [AgendamentoController::class, 'agendamento']);
Route::get('/importarDocumentos', [AgendamentoController::class, 'importarDocumentos']);


// Route::patch('/exportar/pedido', [ExportController::class, 'store']);
// Route::get('/exportar/pedido', [ExportController::class, 'index']);
// Route::post('/exportar/pedido', [ExportController::class, 'store']);



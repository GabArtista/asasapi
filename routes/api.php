<?php

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

//listagem dos boletos pagos e não pagos do responsável
Route::get('responsavel-titular/boletos', [\App\Http\Controllers\Api\Pagamentos\v1\ResponsavelTitular\Boletos\IndexController::class, 'consultaPagosNaoPagos']);
//(opcional) pagamento do boleto pelo titular
Route::post('responsavel-titular/boletos', [\App\Http\Controllers\Api\Pagamentos\v1\ResponsavelTitular\Boletos\StoreController::class, 'pagamentoPeloTitular']);

//listar boletos pagos
Route::get('secretaria/boletos', [\App\Http\Controllers\Api\Pagamentos\v1\Secretaria\Boletos\IndexController::class, 'consultaPagosNaoPagos2']);
//criar cobrança para o titular
Route::post('secretaria/boletos', [\App\Http\Controllers\Api\Pagamentos\v1\Secretaria\Boletos\StoreController::class, 'criaBoletoTitular']);
//pagar salário do funcionário - NÃO PRECISA
Route::post('secretaria/funcionarios', [\App\Http\Controllers\Api\Pagamentos\v1\Secretaria\Funcionario\StoreController::class, 'pagarFuncionario']);
//listagem de pagamento do funcionário
Route::get('secretaria/funcionarios', [\App\Http\Controllers\Api\Pagamentos\v1\Secretaria\Funcionario\IndexController::class, 'colsuntaFuncionariosPagos']);

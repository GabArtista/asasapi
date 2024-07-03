<?php

namespace App\Http\Controllers\Api\Pagamentos\v1\Secretaria\Funcionario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request)
    {
        //COMPROVANTES JÁ EMITIDOS POR ELA (PAGAMENTO DE FUNCIONÁRIO)
        $colunas = ['Data de Vencimento', 'Link do Pagamento'];
        $boletos = Http::withHeaders(['access_token' => env('ASSAS_API_TOKEN')])
            ->acceptJson()
            ->contentType('application/json')
            ->withOptions(['verify' => false])
            ->get(env('ASSAS_API_URL') . '/payments', [
                'customer' => 'cus_000005987957', //opcional
            ])->json()['data'];
        return view('pages.secretaria.funcionario.listar', [
            'colunas' => $colunas,
            'boletos' => $boletos
        ]);
    }
}

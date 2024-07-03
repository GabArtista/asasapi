<?php

namespace App\Http\Controllers\Api\Pagamentos\v1\Secretaria\Boletos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //EMISSÃO DO BOLETO PARA PAGAMENTO
        $response = Http::withHeaders(['access_token' => env('ASSAS_API_TOKEN')])
            ->acceptJson()
            ->contentType('application/json')
            ->withOptions(['verify' => false])
            ->post(env('ASSAS_API_URL') . '/payments', [
                "billingType" => "BOLETO",
                "customer" => "cus_000005987957",
                "value" => 12,
                "dueDate" => "2025-06-10",
            ])->json();
        dd($response);
    }
}

<?php

namespace App\Http\Controllers\Api\Pagamentos\v1\ResponsavelTitular\Boletos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function consulta(Request $request)
    {
        $response = Http::withHeaders(['access_token' => env('ASSAS_API_TOKEN')])
            ->acceptJson()
            ->contentType('application/json')
            ->withOptions(['verify' => false])
            ->get(env('ASSAS_API_URL') . '/payments', [
                'customer' => 'cus_000005987957'
            ])->json();
        dd($response);
    }
}

<?php

namespace App\Http\Controllers\Api\Pagamentos\v1\ResponsavelTitular\Boletos;

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
        $response = Http::withHeaders(['access_token' => env('ASSAS_API_TOKEN')])
            ->acceptJson()
            ->contentType('application/json')
            ->withOptions(['verify' => false])
            ->post(env('ASSAS_API_URL') . '/bill', [
                'identificationField' => '03399.77779 29900.000000 04751.101017 1 81510000002990'
            ])->json();
        dd($response);
    }
}

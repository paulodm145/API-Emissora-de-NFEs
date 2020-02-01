<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesquisarCnaeController extends BaseController
{
    public function dados($cnpj)
    {
        $urlWsdl = $this->retornaURL();
        $soapClient = new \SoapClient($urlWsdl, ['exceptions' => true]);
        $prestador = ["identificacaoPrestador" => $cnpj];
        $response = $soapClient->ConsultarCnae($prestador);
        //$a = json_encode((array)$response);
        //var_dump($response->return[0]->nomeServico);
        return response()->json([$response]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutenticarContribuinteController extends BaseController
{
    public static function autentica(Request $req)
    {
        if (empty($req->json()->all())) {
            return response()->json(["Mensagem" => ' HTTP 403 - Verifique o conteúdo enviado '], 403);
        }
        $dados = $req->json()->all();
        $urlWsdl = $this->retornaURL();
        $soapClient = new \SoapClient($urlWsdl, ['exceptions' => true]);
        $prestador = ["identificacaoPrestador" => $dados["identificacao"], "senha" => $dados["senha"]];
        $response = $soapClient->autenticarContribuinte($prestador);
        return response()->json([$response]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListarServicosMunicipaisPrestadorController extends BaseController
{
    public function ListarServicosMunicipaisPrestador($cnpj){
		
		$urlWsdl = $this->retornaURL();
		$soapClient = new \SoapClient($urlWsdl, ['exceptions' => true]);
		$prestador = ["identificacaoPrestador" => $cnpj];
		$response = $soapClient->ListarServicosMunicipaisPrestador($prestador);
		//$a = json_encode((array)$response);
		//var_dump($response->return[0]->nomeServico);
		return response()->json([$response]); 
		
	}
}

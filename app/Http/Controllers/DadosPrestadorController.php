<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DadosPrestadorController extends BaseController
{
    public function dados($cnpj){
		return response()->json([$cnpj]); 
	}
}

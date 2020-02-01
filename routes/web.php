<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/

$router->get('/', function () {
    return response()->json(["Mensagem" => "Iniciando"]);
});

/*Autenticar Usuário*/
$router->post('autenticar', 'AutenticarContribuinteController@autentica');
$router->post('gerar', 'GerarController@gerarNFE');
$router->get('/cnae/{cnpj}', 'PesquisarCnaeController@Cnae');
$router->get('/ListarServicosMunicipaisPrestador/{cnpj}', 'ListarServicosMunicipaisPrestadorController@ListarServicosMunicipaisPrestador');
$router->get('/DadosPrestador/{cnpj}', 'DadosPrestadorController@dados');

<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    public function __construct()
    {

    }

    /*
|--------------------------------------------------------------------------
| Urls das Apis utilizadas
|--------------------------------------------------------------------------
|
| Este arquivo armazena as urls das Apis utilizadas, dessa forma, Ã©
| possÃ­vel alterar somente aqui caso a url da Api mude.
|
| Como usar:
|   - Em cada api deverÃ¡ ter uma URL base do serviÃ§o, os parÃ¢metros que aceita e a 'url-full';
|   - A 'url-full' concatena a 'url base' e os parÃ¢metros, cada parÃ¢metro vem precedido de uma tralha (#),
|     dessa forma, Ã© possÃ­vel utilizar a funÃ§Ã£o de 'replace' no momento em que for usar a api.
|
| Exemplo:
|   - $url = str_replace('#cep', '29705710', config('apis.viacep.url-full'));
|
*/
    public function retornaURL()
    {
        /*  */
        /* https://es-colatina-pm-nfs.cloud.el.com.br/RpsServiceService?wsdl */
        $urlServico = 'http://es-colatina-pm-nfs.cloud.el.com.br:80/RpsServiceService?wsdl';

        $apis = [
            /* Apis dos municÃ­pios que EL atende para captura do DANFSE: */
            'el-nfse-pdf-colatina' => [
                'url' => "https://nf-colatina-es.el.com.br/paginas/sistema/autenticacaoNota.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full' =>
                    'https://nf-colatina-es.el.com.br/paginas/sistema/autenticacaoNota.jsf' .
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-pdf-alfredo-chaves' => [
                'url' => "https://nf-alfredochaves-es.el.com.br/paginas/sistema/autenticacaoNota.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full' =>
                    'https://nf-alfredochaves-es.el.com.br/paginas/sistema/autenticacaoNota.jsf' .
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-pdf-aracruz' => [
                'url' => "http://nfe.pma.es.gov.br:8080/nfse/paginas/sistema/autenticacaoNota.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full' =>
                    'http://nfe.pma.es.gov.br:8080/nfse/paginas/sistema/autenticacaoNota.jsf' .
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-pdf-confins' => [
                'url' => "https://nf-confins-mg.el.com.br/paginas/sistema/autenticacaoNota.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full' =>
                    'https://nf-confins-mg.el.com.br/paginas/sistema/autenticacaoNota.jsf' .
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-pdf-manhuacu' => [
                'url' => "https://nf-manhuacu-mg.el.com.br/paginas/sistema/autenticacaoNota.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full' =>
                    'https://nf-manhuacu-mg.el.com.br/paginas/sistema/autenticacaoNota.jsf' .
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-pdf-marilandia' => [
                'url' => "https://nf-marilandia-es.el.com.br/paginas/sistema/autenticacaoNota.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full' =>
                    'https://nf-marilandia-es.el.com.br/paginas/sistema/autenticacaoNota.jsf' .
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-pdf-sao-mateus' => [
                'url' => 'https://nf-saomateus-es.el.com.br/paginas/sistema/autenticacaoNota.jsf',
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full' =>
                    'https://nf-saomateus-es.el.com.br/paginas/sistema/autenticacaoNota.jsf' .
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-pdf-sao-joao-dabarra' => [
                'url' => "https://nf-saojoaodabarra-rj.el.com.br/paginas/sistema/autenticacaoNota.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full' =>
                    'https://nf-saojoaodabarra-rj.el.com.br/paginas/sistema/autenticacaoNota.jsf' .
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-pdf-serrinha' => [
                'url' => "http://www.serrinha.ba.gov.br:8080/paginas/sistema/autenticacaoNota.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full' =>
                    'http://www.serrinha.ba.gov.br:8080/paginas/sistema/autenticacaoNota.jsf' .
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-pdf-simoes-filho' => [
                'url' => "http://201.49.29.18/el-nfse0/paginas/sistema/autenticacaoNota.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full' =>
                    'http://201.49.29.18/el-nfse0/paginas/sistema/autenticacaoNota.jsf' .
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
             // TODO As URLs abaixo nÃ£o estÃ£o sendo utilizadas,
            // remover em versÃµes posteriores caso continue em desuso.
            'el-nfse-xml-colatina' => [
                'url'        => "https://nf-colatina-es.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full'   =>
                    'https://nf-colatina-es.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf'.
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-xml-alfredochaves' => [
                'url'        => "https://nf-alfredochaves-es.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full'   =>
                    'https://nf-alfredochaves-es.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf'.
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-xml-aracruz' => [
                'url'        => "http://nfe.pma.es.gov.br:8080/nfse/paginas/sistema/autenticacaoNotaXML.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full'   =>
                    'http://nfe.pma.es.gov.br:8080/nfse/paginas/sistema/autenticacaoNotaXML.jsf'.
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-xml-confins' => [
                'url'        => "https://nf-confins-mg.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full'   =>
                    'https://nf-confins-mg.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf'.
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-xml-manhuacu' => [
                'url'        => "https://nf-manhuacu-mg.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full'   =>
                    'https://nf-manhuacu-mg.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf'.
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-xml-marilandia' => [
                'url'        => "https://nf-marilandia-es.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full'   =>
                    'https://nf-marilandia-es.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf'.
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-xml-saomateus' => [
                'url'        => 'https://nf-saomateus-es.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf',
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full'   =>
                    'https://nf-saomateus-es.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf'.
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-xml-saojoaodabarra' => [
                'url'        => "https://nf-saojoaodabarra-rj.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full'   =>
                    'https://nf-saojoaodabarra-rj.el.com.br/paginas/sistema/autenticacaoNotaXML.jsf'.
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-xml-serrinha' => [
                'url'        => "http://www.serrinha.ba.gov.br:8080/paginas/sistema/autenticacaoNotaXML.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full'   =>
                    'http://www.serrinha.ba.gov.br:8080/paginas/sistema/autenticacaoNotaXML.jsf'.
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],
            'el-nfse-xml-simoesfilho' => [
                'url'        => "http://201.49.29.18/el-nfse0/paginas/sistema/autenticacaoNotaXML.jsf",
                'parametros' => [
                    'cpfCnpj',
                    'chave'
                ],
                'url-full'   =>
                    'http://201.49.29.18/el-nfse0/paginas/sistema/autenticacaoNotaXML.jsf'.
                    '?cpfCnpj=#cpfCnpj&chave=#chave',
            ],

            /*
            //TODO As URLs abaixo nÃ£o estÃ£o sendo utilizadas,
            //     remover em versÃµes posteriores caso continue em desuso.
            // Urls do sistema NFSe da EL para obter os cookies:
            'el-nfse-sis-alfredochaves' => [
                'url'        => 'https://nf-alfredochaves-es.el.com.br//paginas/sistema/login.jsf',
                'parametros' => [],
                'url-full'   => 'https://nf-alfredochaves-es.el.com.br//paginas/sistema/login.jsf',
            ],
            'el-nfse-sis-aracruz' => [
                'url'        => "http://nfe.pma.es.gov.br:8080/nfse/paginas/sistema/login.jsf",
                'parametros' => [],
                'url-full'   => 'http://nfe.pma.es.gov.br:8080/nfse/paginas/sistema/login.jsf',
            ],
            'el-nfse-sis-colatina' => [
                'url'        => "https://nf-colatina-es.el.com.br//paginas/sistema/login.jsf",
                'parametros' => [],
                'url-full'   => 'https://nf-colatina-es.el.com.br//paginas/sistema/login.jsf',
            ],
            'el-nfse-sis-confins' => [
                'url'        => "https://nf-confins-mg.el.com.br//paginas/sistema/login.jsf",
                'parametros' => [],
                'url-full'   => 'https://nf-confins-mg.el.com.br//paginas/sistema/login.jsf',
            ],
            'el-nfse-sis-manhuacu' => [
                'url'        => "https://nf-manhuacu-mg.el.com.br//paginas/sistema/login.jsf",
                'parametros' => [],
                'url-full'   => 'https://nf-manhuacu-mg.el.com.br//paginas/sistema/login.jsf',
            ],
            'el-nfse-sis-marilandia' => [
                'url'        => "https://nf-marilandia-es.el.com.br//paginas/sistema/login.jsf",
                'parametros' => [],
                'url-full'   => 'https://nf-marilandia-es.el.com.br//paginas/sistema/login.jsf',
            ],
            'el-nfse-sis-saomateus' => [
                'url'        => 'https://nf-saomateus-es.el.com.br//paginas/sistema/login.jsf',
                'parametros' => [],
                'url-full'   => 'https://nf-saomateus-es.el.com.br//paginas/sistema/login.jsf',
            ],
            'el-nfse-sis-saojoaodabarra' => [
                'url'        => "https://nf-saojoaodabarra-rj.el.com.br//paginas/sistema/login.jsf",
                'parametros' => [],
                'url-full'   => 'https://nf-saojoaodabarra-rj.el.com.br//paginas/sistema/login.jsf',
            ],
            'el-nfse-sis-serrinha' => [
                'url'        => "http://www.serrinha.ba.gov.br:8080/el-nfse/paginas/sistema/login.jsf",
                'parametros' => [],
                'url-full'   => 'http://www.serrinha.ba.gov.br:8080/el-nfse/paginas/sistema/login.jsf',
            ],
            'el-nfse-sis-simoesfilho' => [
                'url'        => "http://201.49.29.18/el-nfse0/paginas/sistema/login.jsf",
                'parametros' => [],
                'url-full'   => 'http://201.49.29.18/el-nfse0/paginas/sistema/login.jsf',
            ],
            */

            /* Api para para Busca de Cep. */
            'viacep' => [
                'url' => 'https://viacep.com.br/ws/',
                'parametros' => [
                    'cep',
                    'json',
                ],
                'url-full' =>
                    'https://viacep.com.br/ws/#cep/json/',
            ],

            /* Api para para Busca de Cep. */
            'receitaws-cnpj' => [
                'url' => 'https://www.receitaws.com.br/v1/cnpj/',
                'parametros' => [
                    'cnpj',
                ],
                'url-full' =>
                    'https://www.receitaws.com.br/v1/cnpj/#cnpj',
            ],
        ];


        return $urlServico;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NFs\EL\WebService;

class GerarController extends BaseController
{
    
//    {
//	"LoteRps": {
//		"numeroLote": 1000002,
//		"quantidadeRps": 1
//	},
//	"Rps": {
//		"localPrestacao": 1,
//		"issRetido": 1,
//		"dataEmissao": "2020-01-31T00:00:00.000-03:00",
//		"status": 1,
//		"observacao": "Teste",
//		"IdentificacaoRps": {
//			"numero": 1000002,
//			"serie": 1,
//			"tipo": 1
//		}
//	},
//	"DadosPrestador": {
//		"razaoSocial": "EMPRESA TESTE LTDA",
//		"nomeFantasia": "EMPRESINHA",
//		"incentivadorCultural": 2,
//		"optanteSimplesNacional": 2,
//		"naturezaOperacao": 1,
//		"regimeEspecialTributacao": 0,
//		"IdentificacaoPrestador": {
//			"cpfCnpj": "11097137000122",
//			"senha": 123,
//			"inscricaoMunicipal": "0000012345"
//		},
//		"EnderecoPrestador": {
//			"logradouroTipo": "RUA",
//			"logradouro": "Marechal Rondon",
//			"logradouroNumero": "911",
//			"logradouroComplemento": "Casa 2",
//			"bairro": "São Pedro",
//			"codigoMunicipio": 0,
//			"municipio": "Colatina",
//			"uf": "ES",
//			"cep": "29706801"
//		},
//		"ContatoPrestador": {
//			"telefone": "27-3723-1000",
//			"email": "teste@teste.com.br"
//		}
//	},
//	"DadosTomador": {
//		"razaoSocial": "EMPRESA TESTE LTDA",
//		"nomeFantasia": "EMPRESINHA",
//		"incentivadorCultural": 2,
//		"optanteSimplesNacional": 2,
//		"naturezaOperacao": 0,
//		"regimeEspecialTributacao": 0,
//		"IdentificacaoTomador": {
//			"cpfCnpj": "11981495745",
//			"inscricaoMunicipal": "0000012346"
//		},
//		"EnderecoTomador": {
//			"logradouroTipo": "RUA",
//			"logradouro": "Marechal Rondon",
//			"logradouroNumero": "911",
//			"logradouroComplemento": "Casa 2",
//			"bairro": "São Pedro",
//			"codigoMunicipio": 0,
//			"municipio": "Colatina",
//			"uf": "ES",
//			"cep": "29706801"
//		},
//		"ContatoTomador": {
//			"telefone": "27-3723-1000",
//			"email": "teste@teste.com.br"
//		}
//	},
//	"Servicos": [{
//		"codigoCnae": null,
//		"codigoServico116": "4.23",
//		"codigoServicoMunicipal": "4.23",
//		"quantidade": 1,
//		"unidade":  "UN",
//		"descricao": "Teste de Emissão 1",
//		"aliquota": 0.02,
//		"valorServico": 1,
//		"valorIssqn": 0.02,
//		"valorDesconto": 0,
//		"numeroAlvara": null
//	}],
//	"Valores": {
//		"valorServicos": 1,
//		"valorDeducoes": 0,
//		"valorPis": 0,
//		"valorCofins": 0,
//		"valorInss": 0,
//		"valorIr": 0,
//		"valorCsll": 0,
//		"valorIss": 0.02,
//		"valorOutrasRetencoes": 0,
//		"valorLiquidoNfse": 1,
//		"valorIssRetido": 0,
//		"outrosDescontos": 0
//	}
//}



    public function gerarNFE(Request $req)
    {
        $nfseEL = new WebService();
        $nfseEL->setUrlWsdl($this->retornaURL());
        $dados = json_decode($req->getContent());


        if (isset($dados->DadosPrestador)) {
            $nfseEL->DadosPrestador($dados->DadosPrestador);

            if (isset($dados->DadosPrestador->IdentificacaoPrestador)) {
                $nfseEL->IdentificacaoPrestador($dados->DadosPrestador->IdentificacaoPrestador);
            }

            if (isset($dados->DadosPrestador->ContatoPrestador)) {
                $nfseEL->ContatoPrestador($dados->DadosPrestador->ContatoPrestador);
            }

            if (isset($dados->DadosPrestador->EnderecoPrestador)) {
                $nfseEL->EnderecoPrestador($dados->DadosPrestador->EnderecoPrestador);
            }
        }

        if (isset($dados->DadosTomador)) {
            $nfseEL->DadosTomador($dados->DadosTomador);

            if (isset($dados->DadosTomador->IdentificacaoTomador)) {
                $nfseEL->IdentificacaoTomador($dados->DadosTomador->IdentificacaoTomador);
            }

            if (isset($dados->DadosTomador->ContatoTomador)) {
                $nfseEL->ContatoTomador($dados->DadosTomador->ContatoTomador);
            }

            if (isset($dados->DadosTomador->EnderecoTomador)) {
                $nfseEL->EnderecoTomador($dados->DadosTomador->EnderecoTomador);
            }
        }

        if (isset($dados->Servicos)) {
            foreach ($dados->Servicos as $servico) {
                $nfseEL->Servico($servico);
            }
        }

        if (isset($dados->Valores)) {
            $nfseEL->Valores($dados->Valores);
        }

        if (isset($dados->Rps)) {
            $nfseEL->Rps($dados->Rps);

            if (isset($dados->Rps->IdentificacaoRps)) {
                $nfseEL->IdentificacaoRps($dados->Rps->IdentificacaoRps);
            }
        }

        if (isset($dados->LoteRps)) {
            $nfseEL->LoteRps($dados->LoteRps);
        }

        $nfseEL->montar();

        $envio = $nfseEL->transmitirNFse(
            $dados->DadosPrestador->IdentificacaoPrestador->cpfCnpj,
            $dados->DadosPrestador->IdentificacaoPrestador->senha
        );

//      A Primeira consulta responde que a nota está sendo processada, no caso de uma nota válida
        $nfseEL->consultarNFse($dados->DadosPrestador->IdentificacaoPrestador->cpfCnpj, $envio->numeroProtocolo);
//      Por ter sido executada uma consulta logo acima, a nota é processada instantaneamente, tendo os dados do processamento
//        já disponíveis em uma segunda consulta.
        $consulta = $nfseEL->consultarNFse($dados->DadosPrestador->IdentificacaoPrestador->cpfCnpj, $envio->numeroProtocolo);


        return response()->json($consulta);
    }
}

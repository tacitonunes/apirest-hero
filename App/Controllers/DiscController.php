<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\Restapi\DiscDAO;
use App\Models\MySQL\Restapi\DiscModel;

final class DiscController {

    //MÉTODO CHAMADO PELA INDEX DA ROTA PARA VISUALIZAR AS DISCIPLINAS
    public function getDiscs (Request $request, Response $response, array $args): Response {
        $a = new DiscDAO(); // INSTANCIA UM OBJETO DA CLASSE DiscsDAO
        $b = $a->getAllDiscs(); // ATRIBUI A VARIÁVEL AO MÉTODO 'PEGAR TODAS' DA CLASSE DiscsDAO
        $response = $response->withJson($b); //DETERMINA QUE A RESPOSTA SE DARÁ POR JSON
        return $response; // RETORNA A RESPOSTA
    }
    public function getDiscCOD (Request $request, Response $response, array $args): Response {
        $a = new DiscDAO(); // INSTANCIA UM OBJETO DA CLASSE DiscsDAO
        $b = $a->getDisc_COD($args['cod']);
        $response = $response->withJson($b); //DETERMINA QUE A RESPOSTA SE DARÁ POR JSON
        return $response; // RETORNA A RESPOSTA
    }

    //MÉTODO CHAMADO PELA INDEX DA ROTA PARA INSERIR AS DISCIPLINAS
    public function insereDisc(Request $request, Response $response, array $args): Response {
       $dados = $request->getParsedBody(); // DECLARA QUE O CONTEÚDO SERÁ RECEBIDO NO CORPO DA REQUISIÇÃO
       $a = new DiscDAO(); // CRIA NOVA INSTÂNCIA DA CLASSE DE COMUNICAÇÃO COM O DB
       $b = new DiscModel(); // CRIA UM NOVO OBJETO DA CLASSE DISCIPLINA
       $b->setCod($dados['cod'])             // EXECUTA OS MÉTODOS DESSE OBJETO, 
         ->setPeriodo($dados['periodo'])     // ATRIBUINDO OS VALORES A UM ARRAY
         ->setProf($dados['prof']);          // COM OS DADOS INSERIDOS
       $a->inserirDisc($b); // ATRIBUI O ARRAY CRIADO A UMA INSTÂNCIA NO DB
       $response = $response->withJson(['mensagem' => 'Disciplina inserida com sucesso!']); // REGISTRA MENSAGEM DE SUCESSO
       return $response;
   }

   public function alteraDisc(Request $request, Response $response, array $args): Response {
    $dados = $request->getParsedBody(); 
    $a = new DiscDAO();
    $b = new DiscModel();
    $b->setId(null) //(int)$dados['id_d'] PARA REQUERER O ID    
      ->setCod($dados['cod'])             // EXECUTA OS MÉTODOS DESSE OBJETO, 
      ->setPeriodo($dados['periodo'])     // ATRIBUINDO OS VALORES A UM ARRAY
      ->setProf($dados['prof']);          // COM OS DADOS INSERIDOS
    $a->alterarDisc($b);
    $response = $response->withJson(['mensagem' => 'Disciplina alterada com sucesso!']);
    return $response;
    }

    public function deletaDisc(Request $request, Response $response, array $args): Response { ///disciplina?cod="3daw"
        $params = $request->getQueryParams();
        $id = $params['id'];
        $a = new DiscDAO();
        $a->deletarDisc($id);
        $response = $response->withJson(['message' => 'Disciplina excluída com sucesso!']);
        return $response;
    }

}
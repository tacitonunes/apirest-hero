<?php

/* ESTE ARQUIVO POSSUI OS MÉTODOS DO ALUNO PARA CONEXÃO COM BANCO DE DADOS*/

namespace app\dao\restapi;

use app\modelos\restapi\AlunoModel;

class AlunoDAO extends Conexao {

    public function __construct() {
        parent::__construct();
    }

    public function getTodosAlunos(int $disc_id): array {
        $statement = $this->pdo->prepare('SELECT * FROM aluno WHERE disc_id = :disc_id;');
        $statement = bindParam(':disc_id', $disc_id, \PDO::PARAM_INT);
        $statement = execute();
        $aluno = $statement->fetchAll(\PDO::FETCH_ASSOC);        
        return $aluno;
    }

}
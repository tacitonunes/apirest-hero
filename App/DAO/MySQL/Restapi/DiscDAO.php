<?php

/* ESTE ARQUIVO POSSUI OS MÉTODOS DA DISPLCINA PARA CONEXÃO COM BANCO DE DADOS*/

namespace App\DAO\MySQL\Restapi;

use App\Models\MySQL\Restapi\DiscModel;

class DiscDAO extends Conexao {

    public function __construct() {
        parent::__construct();    
    }

    public function getAllDiscs(): array {
        $discs = $this->pdo
        ->query('SELECT * FROM disciplina;')
        ->fetchAll(\PDO::FETCH_ASSOC);
        return $discs;
    }
    public function getDisc_COD(string $cod): array {
        $discs = $this->pdo
            ->query("SELECT * FROM disciplina where cod = '$cod';")
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $discs;
    }

    public function inserirDisc(DiscModel $disc): void {
        $dados = $this->pdo
            ->prepare('INSERT INTO disciplina VALUES(null, :_cod, :_per, :_pro);');
        $dados->execute([
            '_cod'=>$disc->getCod(), 
            '_per'=>$disc->getPeriodo(), 
            '_pro'=>$disc->getProf()
        ]);
    }

    public function alterarDisc(DiscModel $disc): void {
        $dados = $this->pdo
            ->prepare('UPDATE disciplina SET cod=:_cod, prof=:_pro, periodo=:_per WHERE cod=:_cod;');
        $dados->execute([
            '_cod' => $disc->getCod(),
            '_per' => $disc->getPeriodo(),
            '_pro' => $disc->getProf()/*,
            '_id' => $disc->getId()//INSERIR ID*/
        ]);
    }
    
    public function deletarDisc(int $id): void {
        $dados = $this->pdo
            ->prepare(/*'DELETE FROM aluno WHERE disc_id = :a; */
                       'DELETE FROM disciplina WHERE id_d = :a;');
        $dados->execute([ 'a' => $id ]);
    }

}
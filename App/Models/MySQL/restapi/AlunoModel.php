<?php 

/* ESTE ARQUIVO POSSUI TODOS OS MÉTODOS, GETTERS E SETTERS DO ALUNO */

namespace App\Models\MySQL\Restapi;

final class AlunoModel {
    private $id;
    private $matricula;
    private $nome;
    private $nAv1;

//api_rest_3daw.aluno.id_a
    public function getId() : int {
        return $this->id;
    }
    public function setId(int $_id) : AlunoModel {
        $this->id = $_id;
        return $this;
    }
//api_rest_3daw.aluno.matricula
    public function getMatricula() : string {
        return $this->matricula;
    }
    public function setMatricula(float $_mat) : AlunoModel {
        $this->matricula = $_mat;
        return $this;
    }
//api_rest_3daw.aluno.nome
    public function getNome() : string {
        return $this->nome;
    }
    public function setNome(String $_nome) : AlunoModel {
        $this->nome = $_nome;
        return $this;
    }
//api_rest_3daw.aluno.av1.av1
    public function getAv1() : float {
        return $this->nAv1;
    }
    public function setAv1(float $_av1) : AlunoModel {
        $this->nAv1 = $_av1;
        return this;
    }
}
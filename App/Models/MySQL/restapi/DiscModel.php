<?php

/* ESTE ARQUIVO POSSUI TODOS OS MÉTODOS, GETTERS E SETTERS DA DISCIPLINA */

namespace App\Models\MySQL\Restapi;

final class DiscModel {
    private $id_d; 
    private $cod;
    private $periodo;
    private $prof;

    //api_rest_3daw.disciplina.id_d
    public function getId(): int {
        return $this->id_d;
    }
    public function setId($_id): DiscModel {
        $this->id_d = $_id;
        return $this;
    }
    //api_rest_3daw.disciplina.cod
    public function getCod(): string {
        return $this->cod;
    }
    public function setCod($_cod): DiscModel {
        $this->cod = $_cod;
        return $this;
    }
    //api_rest_3daw.disciplina.periodo
    public function getPeriodo(): string {
        return $this->periodo;
    }
    public function setPeriodo($_per): DiscModel {
        $this->periodo = $_per;
        return $this;
    }
    //api_rest_3daw.disciplina.prof
    public function getProf(): string {
        return $this->prof;
    }
    public function setProf($_prof): DiscModel {
        $this->prof = $_prof;
        return $this;
    }
}
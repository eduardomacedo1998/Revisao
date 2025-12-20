<?php

namespace App\Repositories;

use App\Models\Revisoes;
use  App\Models\Disciplinas;

class RevisaoReposytori
{

    private $RevisaoClass;

    public function __construct( Revisoes   $Revisao)
    {
        $this->RevisaoClass = $Revisao;
    }

    public function getAllRevisoes()
    {
        return $this->RevisaoClass->all();
    }

    public function getRevisaoById($id)
    {
        return $this->RevisaoClass->find($id);
    }

    public function createRevisao($data)
    {
        return $this->RevisaoClass->create($data);
    }

    public function updateRevisao($id, $data)
    {
        $revisao = $this->RevisaoClass->find($id);
        if ($revisao) {
            $revisao->update($data);
            return $revisao;
        }
        return null;
    }

    public function deleteRevisao($id)
    {
        $revisao = $this->RevisaoClass->find($id);
        if ($revisao) {
            $revisao->delete();
            return true;
        }
        return false;
    }

    public function createDisciplina($data)
    {
        // Lógica para criar uma nova disciplina
        // Supondo que haja um modelo Disciplina relacionado
        return \App\Models\Disciplinas::create($data);
    }

    public function getAllDisciplinas()
    {
        // Lógica para obter todas as disciplinas
        return \App\Models\Disciplinas::all();
    }

    public function getRevisoesByUsuario($usuario_id)
    {
        return $this->RevisaoClass->where('usuario_id', $usuario_id)->get();
    }

}
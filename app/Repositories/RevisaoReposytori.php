<?php

namespace App\Repositories;

use App\Models\Revisoes;

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

}
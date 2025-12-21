<?php

namespace App\Services;

use App\Models\Disciplinas;
use App\Repositories\RevisaoReposytori;



class RevisoesService
{
    private $revisaoRepository;
    private $disciplinaRepository;

    public function __construct(RevisaoReposytori $revisaoRepository, Disciplinas $disciplinaRepository)
    {
        $this->revisaoRepository = $revisaoRepository;
        $this->disciplinaRepository = $disciplinaRepository;
    }

    public function listAllRevisoes()
    {
        return $this->revisaoRepository->getAllRevisoes();
    }

    public function getRevisao($id)
    {
        return $this->revisaoRepository->getRevisaoById($id);
    }

    public function createRevisao($data)
    {
        return $this->revisaoRepository->createRevisao($data);
    }

    public function updateRevisao($id, $data)
    {
        return $this->revisaoRepository->updateRevisao($id, $data);
    }

    public function deleteRevisao($id)
    {
        return $this->revisaoRepository->deleteRevisao($id);
    }


    // rotas para Disciplinas

    public function createDisciplina($data)
    {
        return $this->disciplinaRepository->create($data);
    }

    public function listAllDisciplinas()
    {
        return $this->disciplinaRepository->all();
    }

    public function getRevisoesByUsuario($usuario_id, $filtros = [])
    {
        return $this->revisaoRepository->getRevisoesByUsuario($usuario_id, $filtros);
    }
}
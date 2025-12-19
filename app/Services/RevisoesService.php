<?php

namespace App\Services;

use App\Repositories\RevisaoReposytori;


class RevisoesService
{
    private $revisaoRepository;

    public function __construct(RevisaoReposytori $revisaoRepository)
    {
        $this->revisaoRepository = $revisaoRepository;
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
}
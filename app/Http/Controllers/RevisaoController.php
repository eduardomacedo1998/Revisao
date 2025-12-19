<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\RevisoesService;

class RevisaoController extends Controller
{
    private $revisoesService;

    public function __construct(RevisoesService $revisoesService)
    {
        $this->revisoesService = $revisoesService;
    }

    public function index()
    {
        $revisoes = $this->revisoesService->listAllRevisoes();
        return response()->json($revisoes);
    }

    public function show($id)
    {
        $revisao = $this->revisoesService->getRevisao($id);
        return response()->json($revisao);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $revisao = $this->revisoesService->createRevisao($data);
        return response()->json($revisao, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $revisao = $this->revisoesService->updateRevisao($id, $data);
        return response()->json($revisao);
    }

    public function destroy($id)
    {
        $this->revisoesService->deleteRevisao($id);
        return response()->json(null, 204);
    }
}

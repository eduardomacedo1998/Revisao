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
        $data['usuario_id'] = session('user')->usuario_id;
        $revisao = $this->revisoesService->createRevisao($data);
        return redirect()->route('revisoes.create')->with('success', 'Revisão criada com sucesso!');
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

    // rota view revisoes\ create

    public function create()
    {
        $disciplinas = $this->revisoesService->listAllDisciplinas();
        return view('revisoes.create', compact('disciplinas'));
    }

    // rotas para Disciplinas

    public function createDisciplina()  
    {

        return view('disciplinas.create');
    }

    public function storeDisciplina(Request $request)
    {
        $data = $request->all();
        $data['usuario_id'] = session('user')->usuario_id;
        $disciplina = $this->revisoesService->createDisciplina($data);
        return redirect()->route('revisoes.create')->with('success', 'Disciplina criada com sucesso!');
    }

    public function home()
    {
        $usuario_id = session('user')->usuario_id;
        $revisoes = $this->revisoesService->getRevisoesByUsuario($usuario_id);
        return view('home', compact('revisoes'));
    }

  
}

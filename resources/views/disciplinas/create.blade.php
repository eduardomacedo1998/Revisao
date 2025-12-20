@extends('layouts.layout')

@section('title', 'Criar Nova Disciplina')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Criar Nova Disciplina</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('disciplinas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nome_disciplina" class="form-label">Nome da Disciplina</label>
                            <input type="text" name="nome_disciplina" id="nome_disciplina" class="form-control" placeholder="Ex: Matemática, Português..." required>
                        </div>

                        <div class="mb-3">
                            <label for="tema_revisao" class="form-label">Tema de Revisão</label>
                            <input type="text" name="tema_revisao" id="tema_revisao" class="form-control" placeholder="Ex: Álgebra, Análise de Texto..." required>
                        </div>

                        <div class="mb-3">
                            <label for="data_entrada" class="form-label">Data de Entrada</label>
                            <input type="date" name="data_entrada" id="data_entrada" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('revisoes.create') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Disciplina</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

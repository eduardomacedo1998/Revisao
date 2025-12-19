@extends('layouts.layout')

@section('title', 'Criar Nova Revisão')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Criar Nova Revisão</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('revisoes.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="disciplina_id" class="form-label">Disciplina</label>
                            <select name="disciplina_id" id="disciplina_id" class="form-select" required>
                                <option value="">Selecione a Disciplina</option>
                                {{-- As disciplinas serão carregadas aqui pelo backend --}}
                                @if(isset($disciplinas))
                                    @foreach($disciplinas as $disciplina)
                                        <option value="{{ $disciplina->disciplina_id }}">{{ $disciplina->nome_disciplina }} - {{ $disciplina->tema_revisao }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="conteudo" class="form-label">Conteúdo</label>
                            <input type="text" name="conteudo" id="conteudo" class="form-control" placeholder="Ex: Capítulo 1, Exercícios de Fixação" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="data_revisao" class="form-label">Data da Revisão</label>
                                <input type="date" name="data_revisao" id="data_revisao" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dias_proxima_revisao" class="form-label">Dias para Próxima Revisão</label>
                                <input type="number" name="dias_proxima_revisao" id="dias_proxima_revisao" class="form-control" placeholder="Ex: 7" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="link_revisao" class="form-label">Link da Revisão (Opcional)</label>
                            <input type="url" name="link_revisao" id="link_revisao" class="form-control" placeholder="https://...">
                        </div>

                        <div class="mb-3">
                            <label for="observacao" class="form-label">Observação (Opcional)</label>
                            <textarea name="observacao" id="observacao" class="form-control" rows="3" placeholder="Alguma observação importante..."></textarea>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('home') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Revisão</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

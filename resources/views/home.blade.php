@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Bem-vindo, {{ session('user')->usuario_nome }}</h2>
            <a href="{{ route('revisoes.create') }}" class="btn btn-primary">Nova Revisão</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="row">
            @if($revisoes && $revisoes->count() > 0)
                @foreach($revisoes as $revisao)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-header bg-primary text-white">
                                <h5 class="card-title mb-0">{{ $revisao->disciplina->nome_disciplina ?? 'Disciplina' }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <strong>Conteúdo:</strong> {{ $revisao->conteudo ?? 'N/A' }}
                                </p>
                                <p class="card-text">
                                    <strong>Data da Revisão:</strong> {{ \Carbon\Carbon::parse($revisao->data_revisao)->format('d/m/Y') }}
                                </p>
                                <p class="card-text">
                                    <strong>Próxima Revisão:</strong> {{ $revisao->dias_proxima_revisao }} dias
                                </p>
                                @if($revisao->observacao)
                                    <p class="card-text">
                                        <strong>Observação:</strong> {{ $revisao->observacao }}
                                    </p>
                                @endif
                                @if($revisao->link_revisao && $revisao->link_revisao !== 'vazio')
                                    <p class="card-text">
                                        <a href="{{ $revisao->link_revisao }}" target="_blank" class="btn btn-sm btn-outline-primary">Acessar Link</a>
                                    </p>
                                @endif
                            </div>
                            <div class="card-footer bg-light d-flex gap-2">
                                <a href="{{ route('revisoes.index') }}/{{ $revisao->revisao_id }}" class="btn btn-sm btn-info">Ver Detalhes</a>
                                <button class="btn btn-sm btn-danger">Deletar</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-info">
                        <p>Nenhuma revisão criada ainda. <a href="{{ route('revisoes.create') }}" class="alert-link">Clique aqui</a> para criar uma nova.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
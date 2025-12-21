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

        <!-- Filtro -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Filtrar Revisões</h5>
            </div>
            <div class="card-body">
                <form id="filterForm" method="GET" action="{{ route('revisoes.filter') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="filterDisciplina" class="form-label">Disciplina</label>
                            <select name="disciplina_id" id="filterDisciplina" class="form-select">
                                <option value="">Todas as Disciplinas</option>
                                @foreach($disciplinas ?? [] as $disciplina)
                                    <option value="{{ $disciplina->disciplina_id }}" {{ request('disciplina_id') == $disciplina->disciplina_id ? 'selected' : '' }}>
                                        {{ $disciplina->nome_disciplina }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="filterDataInicio" class="form-label">Data Início</label>
                            <input type="date" name="data_inicio" id="filterDataInicio" class="form-control" value="{{ request('data_inicio') }}">
                        </div>

                        <div class="col-md-3">
                            <label for="filterDataFim" class="form-label">Data Fim</label>
                            <input type="date" name="data_fim" id="filterDataFim" class="form-control" value="{{ request('data_fim') }}">
                        </div>

                        <div class="col-md-2">
                            <label for="filterOrdenacao" class="form-label">Ordenar por</label>
                            <select name="ordenacao" id="filterOrdenacao" class="form-select">
                                <option value="recente" {{ request('ordenacao') == 'recente' ? 'selected' : '' }}>Mais Recente</option>
                                <option value="antigo" {{ request('ordenacao') == 'antigo' ? 'selected' : '' }}>Mais Antigo</option>
                                <option value="proxima" {{ request('ordenacao') == 'proxima' ? 'selected' : '' }}>Próxima Revisão</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <label for="filterBusca" class="form-label">Buscar Conteúdo</label>
                            <input type="text" name="busca" id="filterBusca" class="form-control" placeholder="Digite para buscar..." value="{{ request('busca') }}">
                        </div>

                        <div class="col-md-6 d-flex align-items-end gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i> Filtrar
                            </button>
                            <a href="{{ route('home') }}" class="btn btn-secondary">
                                Limpar Filtros
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Cards de Revisões -->
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
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal" data-revisao-id="{{ $revisao->revisao_id }}">Ver Detalhes</button>
                                <button class="btn btn-sm btn-danger">Deletar</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-info">
                        <p>Nenhuma revisão encontrada. <a href="{{ route('revisoes.create') }}" class="alert-link">Clique aqui</a> para criar uma nova.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal para Ver Detalhes -->
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Detalhes da Revisão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Carregando...</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('detailsModal').addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const revisaoId = button.getAttribute('data-revisao-id');
            const modalBody = document.getElementById('modalBody');

            // Fazer requisição AJAX
            fetch(`/revisoes/${revisaoId}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                const dataFormatada = new Date(data.data_revisao).toLocaleDateString('pt-BR');
                
                modalBody.innerHTML = `
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>ID:</strong> ${data.revisao_id}</p>
                                <p><strong>Data da Revisão:</strong> ${dataFormatada}</p>
                                <p><strong>Número de Revisões:</strong> ${data.numero_revisoes}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Dias para Próxima Revisão:</strong> ${data.dias_proxima_revisao}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <p><strong>Conteúdo:</strong></p>
                                <p>${data.conteudo || 'N/A'}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p><strong>Observação:</strong></p>
                                <p>${data.observacao || 'Nenhuma observação'}</p>
                            </div>
                        </div>
                        ${data.link_revisao && data.link_revisao !== 'vazio' ? `
                            <div class="row">
                                <div class="col-12">
                                    <p><strong>Link:</strong></p>
                                    <a href="${data.link_revisao}" target="_blank" class="btn btn-outline-primary btn-sm">Acessar Link</a>
                                </div>
                            </div>
                        ` : ''}
                    </div>
                `;
            })
            .catch(error => {
                modalBody.innerHTML = '<div class="alert alert-danger">Erro ao carregar os detalhes.</div>';
                console.error('Erro:', error);
            });
        });
    </script>
@endsection
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
        
        <div class="card">
            <div class="card-body">
                <p>Você está logado no sistema de revisões.</p>
            </div>
        </div>
    </div>
@endsection
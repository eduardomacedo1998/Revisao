@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <h2>Welcome to the Home Page</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <p>You have successfully logged in. {{ session('user')->usuario_nome }}</p>
    </div>
@endsection
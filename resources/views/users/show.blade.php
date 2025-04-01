@extends('layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')
    <h1>Detalhes do Usuário #{{ $user->id }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informações do Usuário</h5>
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Data de Criação:</strong> {{ $user->created_at->format('d/m/Y H:i:s') }}</p>
            <p><strong>Última Atualização:</strong> {{ $user->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection 
@extends('layouts.app')

@section('title', 'Detalhes do Produto')

@section('content')
    <h1>Detalhes do Produto #{{ $product->id }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informações do Produto</h5>
            <p><strong>Nome:</strong> {{ $product->name }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($product->preco, 2, ',', '.') }}</p>
            <p><strong>Descrição:</strong> {{ $product->description }}</p>
            <p><strong>Data de Criação:</strong> {{ $product->created_at->format('d/m/Y H:i:s') }}</p>
            <p><strong>Última Atualização:</strong> {{ $product->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection 
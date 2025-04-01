@extends('layouts.app')

@section('title', 'Detalhes do Pedido')

@section('content')
    <h1>Detalhes do Pedido #{{ $order->id }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informações do Pedido</h5>
            <p><strong>Cliente:</strong> {{ $order->user->name }}</p>
            <p><strong>Produto:</strong> {{ $order->product->name }}</p>
            <p><strong>Quantidade:</strong> {{ $order->quantity }}</p>
            <p><strong>Preço Total:</strong> R$ {{ number_format($order->total_price, 2, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Data de Criação:</strong> {{ $order->created_at->format('d/m/Y H:i:s') }}</p>
            <p><strong>Última Atualização:</strong> {{ $order->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection 
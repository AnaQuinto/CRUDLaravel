@extends('layouts.app')

@section('title', isset($order) ? 'Editar Pedido' : 'Novo Pedido')

@section('content')
    <h1>{{ isset($order) ? 'Editar Pedido' : 'Novo Pedido' }}</h1>

    <form action="{{ isset($order) ? route('orders.update', $order->id) : route('orders.store') }}" method="POST">
        @csrf
        @if(isset($order))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="user_id" class="form-label">Cliente</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Selecione um cliente</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ isset($order) && $order->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Produto</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">Selecione um produto</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ isset($order) && $order->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} - R$ {{ number_format($product->preco, 2, ',', '.') }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantidade</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $order->quantity ?? '' }}" required min="1">
        </div>

        <div class="mb-3">
            <label for="total_price" class="form-label">Preço Total</label>
            <input type="number" name="total_price" id="total_price" class="form-control" value="{{ $order->total_price ?? '' }}" required step="0.01">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">Selecione o status</option>
                <option value="pendente" {{ isset($order) && $order->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="processando" {{ isset($order) && $order->status == 'processando' ? 'selected' : '' }}>Processando</option>
                <option value="concluido" {{ isset($order) && $order->status == 'concluido' ? 'selected' : '' }}>Concluído</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection 
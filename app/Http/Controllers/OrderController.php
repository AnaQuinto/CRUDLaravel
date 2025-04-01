<?php 

namespace App\Http\Controllers; 

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request; 

class OrderController extends Controller { 
    public function index() { 
        $orders = Order::with(['user', 'product'])->get();
        return view('orders.index', compact('orders')); 
    } 
    
    public function create() {
        $users = User::all();
        $products = Product::all();
        return view('orders.form', compact('users', 'products'));
    }
    
    public function store(Request $request) { 
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric',
            'status' => 'required|string'
        ]);

        Order::create($validated);
        return redirect()->route('orders.index')->with('success', 'Pedido criado com sucesso!'); 
    } 
    
    public function show($id) { 
        $order = Order::with(['user', 'product'])->findOrFail($id);
        return view('orders.show', compact('order')); 
    } 
    
    public function edit($id) {
        $order = Order::findOrFail($id);
        $users = User::all();
        $products = Product::all();
        return view('orders.form', compact('order', 'users', 'products'));
    }
    
    public function update(Request $request, $id) { 
        $order = Order::findOrFail($id);
        
        $validated = $request->validate([
            'user_id' => 'exists:users,id',
            'product_id' => 'exists:products,id',
            'quantity' => 'integer|min:1',
            'total_price' => 'numeric',
            'status' => 'string'
        ]);

        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Pedido atualizado com sucesso!'); 
    } 
    
    public function destroy($id) { 
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pedido removido com sucesso!'); 
    } 
}
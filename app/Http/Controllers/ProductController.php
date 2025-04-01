<?php 

namespace App\Http\Controllers; 

use App\Models\Product;
use Illuminate\Http\Request; 

class ProductController extends Controller 
{ 
    public function index() { 
        $products = Product::all();
        return view('products.index', compact('products')); 
    } 
    
    public function create() {
        return view('products.form');
    }
    
    public function store(Request $request) { 
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!'); 
    } 
    
    public function show($id) { 
        $product = Product::findOrFail($id);
        return view('products.show', compact('product')); 
    } 
    
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.form', compact('product'));
    }
    
    public function update(Request $request, $id) { 
        $product = Product::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!'); 
    } 
    
    public function destroy($id) { 
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produto removido com sucesso!'); 
    }
}
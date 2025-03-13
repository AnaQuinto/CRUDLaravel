<?php 

namespace App\Http\Controllers; 

use Illuminate\Http\Request; 

class ProductController extends Controller 
{ 
    private $products = [ 
        ['id' => 1, 'name' => 'havaianas', 'price' => 100], 
        ['id' => 2, 'name' => 'tenis', 'price' => 200] 
    ]; 
    
    public function index() { 
        return response()->json($this->products); 
    } 
    
    public function store(Request $request) { 
        return response()->json(['message' => 'Produto criado com sucesso!']); 
    } 
    
    public function show($id) { 
        return response()->json(['id' => $id, 'havaianas' => 'chinelo', 'preco' => 150]); 
    } 
    
    public function update(Request $request, $id) { 
        return response()->json(['message' => 'Produto atualizado com sucesso!']); 
    } 
    
    public function destroy($id) { 
        return response()->json(['message' => 'Produto removido com sucesso!']); 
    }
}
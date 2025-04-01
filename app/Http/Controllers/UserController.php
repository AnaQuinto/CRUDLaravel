<?php 

namespace App\Http\Controllers; 

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller { 
    
    public function index() { 
        $users = User::all();
        return view('users.index', compact('users')); 
    } 
    
    public function create() {
        return view('users.form');
    }
    
    public function store(Request $request) { 
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!'); 
    } 
    
    public function show($id) { 
        $user = User::findOrFail($id);
        return view('users.show', compact('user')); 
    } 
    
    public function edit($id) {
        $user = User::findOrFail($id);
        return view('users.form', compact('user'));
    }
    
    public function update(Request $request, $id) { 
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8'
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!'); 
    } 
    
    public function destroy($id) { 
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso!'); 
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
    public function index(){
    	$user = User::all();
    	$total = User::all()->count();
    	return view('list-user', compact('user','total'));
    }

    public function create(){
    	return view('include-user');
    }

    public function store(Request $request){
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->cpf = $request->cpf;
    	$user->save();
    	return redirect()->route('user.index')->with('message','Usuário criado com sucesso!');
    }

    public function show($id){
 		//
    }

    public function edit($id){
    	$user = User::findOrFail($id);
    	return view('alter-user', compact('user'));
    }

    public function update(Request $request, $id){
    	$user = User::findOrFail($id);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->cpf = $request->cpf;
    	$user->save();
    	return redirect()->route('user.index')->with('message','Usuário alterado com sucesso!');
    }

    public function destroy($id){
    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect()->route('user.index')->with('message','Usuário excluído com sucesso!');
    }
}

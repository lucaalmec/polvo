<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
    	$post = Post::all();
    	$total = Post::all()->count();
    	return view('list-post', compact('post','total'));
    }

    public function create(){
    	return view('include-post'); /*Mudar nome das views*/
    }

    public function store(Request $request){
    	$post = new Post;
    	$post->titulo = $request->titulo;
    	$post->autor = $request->autor;
    	$post->data_publi = $request->data_publi;
    	$post->conteudo = $request->conteudo;
    	$post->save();
    	return redirect()->route('post.index')->with('message','Post salvo com sucesso');
    }

    public function show($id){
 		//
    }

    public function edit($id){
    	$post = Post::findOrFail($id);
    	return view('alter-post', compact('post'));
    }

    public function update(Request $request, $id){
    	$post = Post::findOrFail($id);
    	$post->titulo = $request->titulo;
    	$post->autor = $request->autor;
    	$post->data_publi = $request->data_publi;
    	$post->conteudo = $request->conteudo;
    	$post->save();
    	return redirect()->route('post.index')->with('message','Post alterado com sucesso');
    }

    public function destroy($id){
    	$post = Post::findOrFail($id);
    	$post->delete();
    	return redirect()->route('post.index')->with('message','Post excluído com sucesso');
    }
}

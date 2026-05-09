<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function create(){
        
        return view('admin.categories.create.index');
    }

    public function store(Request $request){
        
        $categories = new Categorie();

          $validatedData = $this->validate($request,[
            'name' => 'required',
            ], 
            ['name.required'=>'Campo obrigatório',
        ]);
        
        $categories->name = $request->name;

        $categories->save();
        return redirect()->route('categorie.index')->with('success', 'Categoria Adicionada com Sucesso');
        
    }

    public function index(){
        $categories = Categorie::all();
        return view('admin.categories.list.index', compact('categories'));
    }

    public function edit($id){
        
        $categories = Categorie::findOrFail($id);
        return view ('admin.categories.edit.index', compact('categories')); 
        
    }

    public function destroy($id){

        $categories = Categorie::findOrFail($id);
        $categories->delete();
        return redirect()->route('categorie.index')->with('delete', 'Categoria Removida com Sucesso');

    }

    public function update(Request $request){
        $categories = Categorie::findOrFail($request->id)->update($request->all());
        return redirect()->route('categorie.index')->with('update', 'Categoria Atualizada com Sucesso');
    }
}

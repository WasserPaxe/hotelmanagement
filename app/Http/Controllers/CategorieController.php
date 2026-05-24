<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller

{
    
    public function index(){
        $categories = Categorie::orderBy('created_at', 'desc')->get();
        return view('admin.categories.list.index', compact('categories'));
    }
    
    public function create(){
        
        return view('admin.categories.create.index');
    }

    public function store(Request $request){
        
        $categories = new Categorie();

          $validatedData = $this->validate($request,[
            'name' => 'required |max:25|unique:categories,name',
            'description'=>'nullable| max:500'
            
            ], 
            ['name.required'=>'Campo obrigatório',~
             'name.max'=> 'A categoria deve ter no máximo 25 caracteres',
             'name.unique' => 'Esta categoria já encontra-se cadastrada!', 
             'description.max' => 'A descrição deve ter no máximo 500 caracteres',
             
        ]);
        
        $categories->name = $request->name;

        $categories->save();
        return redirect()->route('categorie.index')->with('success', 'Categoria Adicionada com Sucesso');
        
    }

    
    public function edit($id){
        
        $categories = Categorie::findOrFail($id);
        return view ('admin.categories.edit.index', compact('categories')); 
        
    }

    public function update(Request $request){
        $categories = Categorie::findOrFail($request->id)->update($request->all());
        return redirect()->route('categorie.index')->with('update', 'Categoria Atualizada com Sucesso');
    }

    public function destroy($id){

        $categories = Categorie::findOrFail($id);
        $categories->delete();
        return redirect()->route('categorie.index')->with('delete', 'Categoria Removida com Sucesso');

    }

    public function price(){
        
        $categories = Categorie::all();

        return view('admin.categories.price.index', compact('categories'));
    }

    
}

<?php

namespace App\Http\Controllers;
use App\Models\Typespace;

use Illuminate\Http\Request;

class TypespaceController extends Controller
{
    public function index(){
        $typespaces = Typespace::all();
        return view('admin.typespaces.list.index', compact('typespaces'));
    }

    public function create(){
        return view('admin.typespaces.create.index');
    }

    public function store(Request $request){
        $typespaces = new Typespace();

        $validatedData = $this->validate($request, [
            'name'=> 'required',
        ],
        [
            'name.required' => 'Campo obrigatorio'
        ]);

        $typespaces->name = $request->name;
        $typespaces->save();
        return redirect()->route('typespace.index')->with('success', 'Tipo de Sala Criado Com Sucesso');
    }

    public function edit($id){
        $typespaces = Typespace::findOrFail($id);
        return view('admin.typespaces.edit.index', compact('typespaces'));
    }

    public function update(Request $request){
        $typespaces = Typespace::findOrFail($request->id)->update($request->all());
        return redirect()->route('typespace.index')->with('update', 'Tipo de Sala Atualizado com Sucesso');
    }

    public function destroy($id){
        $typespaces = Typespace::findOrFail($id);
        $typespaces->delete();
        return redirect()->route('typespace.index')->with('delete', 'Tipo de Sala Excluido com Sucesso');
    }
}

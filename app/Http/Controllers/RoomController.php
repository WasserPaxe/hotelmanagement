<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Categorie;

class RoomController extends Controller
{
    
    public function index(){
        $rooms = Room::all();
        $categories = Categorie::all();
        return view('admin.rooms.list.index', compact('rooms', 'categories'));
    }



    public function create(){
        
        $categories = Categorie::all();
         
        return view('admin.rooms.create.index', compact('categories'));
    }

    public function store(Request $request){
        $categories = Categorie::all(); 
        $rooms = new Room();

           $validatedData = $this->validate($request,[
            'number' => 'required',
            'categorie_id' => 'required',
            'status' => 'required',
            'conditions' => 'required',
            ], 
            [
            'number.required'=>'Campo obrigatório',
            'categorie_id.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',
            'conditions.required'=>'Campo obrigatório',

        ]); 
        
        $rooms->number = $request->number;
        $rooms->floor = $request->floor;
        $rooms->categorie_id = $request->categorie_id;
        $rooms->status = $request->status;
        $rooms->conditions = $request->conditions;


        $rooms->save();
        return redirect()->route('room.index')->with('success', 'Quarto Adicionado com Sucesso');
    }

    public function edit($id){
        $categories = Categorie::all();
        $rooms = Room::findOrFail($id);
        return view('admin.rooms.edit.index', compact('rooms', 'categories'));
    }

    public function destroy($id){
        
        $rooms = Room::findOrFail($id);
        $rooms->delete();
        return redirect()->route('room.index')->with('delete', 'Quarto Removido com Sucesso');

    }

       public function update(Request $request){

        $validatedData = $this->validate($request,[
            'number' => 'required',
            'categorie_id' => 'required',
            'status' => 'required',
            'conditions' => 'required',
            ], 
            [
            'number.required'=>'Campo obrigatório',
            'categorie_id.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',
            'conditions.required'=>'Campo obrigatório',

        ]);

        $rooms = Room::findOrFail($request->id)->update($request->all());
        return redirect()->route('room.index')->with('update', 'Quarto Atualizado com Sucesso');
    }
}

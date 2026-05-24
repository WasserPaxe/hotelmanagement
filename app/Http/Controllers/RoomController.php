<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Categorie;

class RoomController extends Controller
{
    
    public function index(){

        $rooms = Room::orderBy('created_at', 'desc')->get();;
        $totalRooms = Room::count();
        
        return view('admin.rooms.list.index', compact('rooms', 'totalRooms'));
    }



    public function create(){
        
        $categories = Categorie::all();
         
        return view('admin.rooms.create.index', compact('categories'));
    }

    public function store(Request $request){
       
        $categories = Categorie::all(); 
        
        $rooms = new Room();

           $validatedData = $this->validate($request,[
           'number' => 'required|unique:rooms,number',
           'name' => 'nullable|unique:rooms,name',
           'categorie_id' => 'required',
           'status' => 'required',
           'description' => 'nullable',
           'price' => 'required|numeric| min:0',
           'phone' => ['nullable', 'regex:/^\+[0-9]{1,3}[0-9]{7,14}$/'],
           'floor'=>'nullable|',
           'bed'=>'required',
           'meal'=>'nullable',
            ], 
            [
            'number.required'=>'Campo obrigatório',
            'number.unique' => 'Já tem um quarto com este número',
            'name.unique' => 'Já tem um quarto com este nome',
            'categorie_id.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',
            'price.required'=>'Campo obrigatório',
            'price.numeric' => 'Digite formato de preço válido', 
            'price.min' => 'Digite formato de preço válido (valores positivos)',
            'phone.regex' => 'Digite um formato de telefone válido (ex.:(+244 9XXXXXXXX))',
            'bed.required' => 'Campo obrigatório',

        ]); 
        
        $rooms->phone = $validatedData['phone'];
        $rooms->bed = $validatedData['bed'];
        $rooms->meal = $validatedData['meal'];
        $rooms->name = $validatedData['name'];
        $rooms->number = $validatedData['number'];
        $rooms->floor = $validatedData['floor'];
        $rooms->price = $validatedData['price'];
        $rooms->categorie_id = $validatedData['categorie_id'];
        $rooms->status = $validatedData['status'];
        $rooms->description = $validatedData['description'];

        $rooms->save();
        return redirect()->route('room.index')->with('success', 'Quarto Adicionado com Sucesso');
    }

     public function show(int $id){
        $categories = Categorie::all();
        $rooms = Room::findOrFail($id);
        return view('admin.rooms.details.index', compact('rooms', 'categories'));
    }

    public function edit(int $id){
        $categories = Categorie::all();
        $rooms = Room::findOrFail($id);
        return view('admin.rooms.edit.index', compact('rooms', 'categories'));
    }

    public function update(Request $request){

        $rooms = Room::findOrFail($request->id);

       $validatedData = $this->validate($request,[
           'number' => 'required|unique:rooms,number',
           'name' => 'nullable|unique:rooms,name',
           'categorie_id' => 'required',
           'status' => 'required',
           'description' => 'nullable',
           'price' => 'required',
           'phone' => ['nullable', 'regex:/^\+[0-9]{1,3}[0-9]{7,14}$/'],
           'floor'=>'nullable|',
           'bed'=>'required',
           'meal'=>'nullable',
            ], 
            [
            'number.required'=>'Campo obrigatório',
            'number.unique' => 'Já tem um quarto com este número',
            'name.unique' => 'Já tem um quarto com este nome',
            'categorie_id.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',
            'price.required'=>'Campo obrigatório',
            'phone.regex' => 'Digite um formato de telefone válido (ex.:(+244 9XXXXXXXX))',
            'bed.required' => 'Campo obrigatório',

        ]); 
        

        $rooms->update($request->all());

        return redirect()->route('room.index')->with('update', 'Quarto Atualizado com Sucesso');
    }

    public function destroy(int $id){
        
        $rooms = Room::findOrFail($id);
        $rooms->delete();
        return redirect()->route('room.index')->with('delete', 'Quarto Removido com Sucesso');

    }

    public function search(Request $request){
        $rooms = Room::where('name', 'LIKE', "%{$request->search}%")
                                ->orWhere('price', 'LIKE', "%{$request->search}%")
                                ->orWhere('number', 'LIKE', "%{$request->search}%")
                                ->orWhere('name', 'LIKE', "%{$request->search}%")
                                ->orWhere('status', 'LIKE', "%{$request->search}%")
                                ->orWhere('floor', 'LIKE', "%{$request->search}")
                                ->orWhere('phone', 'LIKE', "%{$request->search}%")
                                ->orWhereHAs('categorie', function($query) use ($request){
                                    $query->where('name', 'LIKE', "%{$request->search}%");
                                })
                                ->get();
        return view('admin.rooms.list.index', compact('rooms'));
    }

    public function createDetailPdf(int $id){
        $rooms = Room::findOrFail($id);
        $pdf = PDF::loadview('pdfs.rooms.details.index', compact('rooms'));
        return $pdf->download('room.pdf');
    }

    public function createListPdf(){
        $rooms = Room::all();
        $totalRooms = Room::count();
        $totalCategories = Room::where('categorie_id')->count();
   
        // Conta quantas categorias DIFERENTES existem nesses quartos
         // O 'pluck' pega só os IDs das categorias, 'unique' elimina repetidos, 'count' conta
         $totalCategories = $rooms->pluck('categorie_id')->unique()->count();
        $pdf = PDF::loadview('pdfs.rooms.list.index', compact('rooms', 'totalRooms', 'totalCategories'));
        return $pdf->download('AllRooms.pdf');
    }

       
}

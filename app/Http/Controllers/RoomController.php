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
            'description' => 'nullable',
            'price' => 'required',
            ], 
            [
            'number.required'=>'Campo obrigatório',
            'categorie_id.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',
            'price.required'=>'Campo obrigatório',

        ]); 
        
        $rooms->phone = $request->phone;
        $rooms->bed = $request->bed;
        $rooms->meal = $request->meal;
        $rooms->name = $request->name;
        $rooms->number = $request->number;
        $rooms->floor = $request->floor;
        $rooms->price = $request->price;
        $rooms->categorie_id = $request->categorie_id;
        $rooms->status = $request->status;
        $rooms->description = $request->description;

        
        $rooms->save();
        return redirect()->route('room.index')->with('success', 'Quarto Adicionado com Sucesso');
    }

     public function show($id){
        $categories = Categorie::all();
        $rooms = Room::findOrFail($id);
        return view('admin.rooms.details.index', compact('rooms', 'categories'));
    }

    public function edit($id){
        $categories = Categorie::all();
        $rooms = Room::findOrFail($id);
        return view('admin.rooms.edit.index', compact('rooms', 'categories'));
    }

    public function update(Request $request){

        $rooms = Room::findOrFail($request->id);

        $validatedData = $this->validate($request,[
            'number' => 'required',
            'categorie_id' => 'required',
            'status' => 'required',
            'description' => 'nullable',
            'price' => 'required',
            ], 
            [
            'number.required'=>'Campo obrigatório',
            'categorie_id.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',
            'price.required'=>'Campo obrigatório',

        ]);

        $rooms->update($request->all());

        return redirect()->route('room.index')->with('update', 'Quarto Atualizado com Sucesso');
    }

    public function destroy($id){
        
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

    public function createDetailPdf($id){
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commodity;

class CommodityController extends Controller
{
    public function index(){

        $commodities = Commodity::all();

        return view('admin.commodities.list.index', compact('commodities'));
    }

    public function create(){

        return view('admin.commodities.create.index');
    }

    public function store(Request $request){
        $commodities = new Commodity();

         $validatedData = $this->validate($request,[
            'name' => 'required',
            'price' => 'required'], 
            
            ['name.required'=>'Campo obrigatório',
            'price.required'=>'Campo obrigatório',
           
        ]);

        $commodities->name = $request->name;
        $commodities->price = $request->price;
       
        $commodities->save();
        
        return redirect()->route('commodity.index')->with('success', 'Comodidade Adicionado Com Sucesso');
    }

    public function edit($id){
        
        $commodities = Commodity::findOrFail($id);
        return view('admin.commodities.edit.index', compact('commodities')); 
    }

    public function update(Request $request){

          $validatedData = $this->validate($request,[
            'name' => 'required',
            'price' => 'required'], 
            
            ['name.required'=>'Campo obrigatório',
            'price.required'=>'Campo obrigatório',
           
        ]);


        $commodities = Commodity::findOrFail($request->id)->update($request->all());
        return redirect()->route('commodity.index')->with('update', 'Comodidade Atualizado Com Sucesso');

    }

    public function destroy($id){
        $commodities = Commodity::findOrFail($id);
        $commodities->delete();
        return redirect()->route('commodity.index')->with('delete', 'Comodidade Excluída Com Sucesso');
    }


}

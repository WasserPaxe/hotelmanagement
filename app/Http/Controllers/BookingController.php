<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Categorie;
use App\Models\Booking;
use App\Models\Commodity;


class BookingController extends Controller
{
    public function index(){
        $commodities = Commodity::all();
        $rooms = Room::all();
        $customers = Customer::all();
        $categories = Categorie::all();
        $bookings = Booking::all();

        return view('admin.bookings.list.index', compact('bookings', 'customers', 'rooms','categories', 'commodities'));

    }

    public function create(){
        $categories =  Categorie::all();
        $commodities = Commodity::all();
        $customers = Customer::all();
        $rooms = Room::all();

        return view('admin.bookings.create.index', compact('customers', 'rooms', 'commodities', 'categories'));
    }

    public function store(Request $request){
        
        $bookings = new Booking();

          $validatedData = $this->validate($request,[
            'customer_id' => 'required',
            'room_id' => 'required',
            'status' => 'required',
            'checkin'=> 'required',
            'checkout' => 'required',
            'commodities' => 'nullable | array',
            'commodities.*' => 'exists:commodities,id',"exists" 
            
            ], 
            ['customer_id.required'=>'Campo obrigatório',
            'room_id.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',
            'checkin.required'=>'Campo obrigatório',
            'checkout'=>'Campo obrigatório',
        ]); 

        $bookings->commodities = $request->commodities;
        $bookings->status = $request->status;
        $bookings->description = $request->description;
        $bookings->checkin = $request->checkin;
        $bookings->checkout = $request->checkout;
        $bookings->customer_id = $request->customer_id;
        $bookings->room_id = $request->room_id;

        $bookings = Booking::create($validatedData);

        if ($request->has('commodities')){
            $bookings->commodities()->sync($request->input('commodities'));
        }

        
        return redirect()->route('booking.index')->with('success', 'Reserva Criada com Sucesso');
        
    }

    public function show($id){

        $commodities = Commodity::all();
        $categories = Categorie::all();
        $rooms = Room::all();
        $customers = Customer::all();
        $bookings = Booking::findOrFail($id);
        return view('admin.bookings.details.index', compact('bookings', 'rooms', 'customers', 'categories', 'commodities'));
    }

    public function edit($id){
        
        $commodities = Commodity::all();
        $categories = Categorie::all();
        $rooms = Room::all();
        $customers = Customer::all();
        $bookings = Booking::findOrFail($id);
        return view('admin.bookings.edit.index', compact('bookings', 'customers', 'rooms', 'commodities', 'categories'));
    }

    public function update(Request $request){

        $bookings = Booking::findOrFail($request->id)->update($request->all());
        return redirect()->route('booking.index')->with('update', 'Reserva Atualizada com Sucesso');

    }

    public function destroy($id){
        $bookings = Booking::findOrFail($id)->delete();
        return redirect()->route('booking.index')->with('delete', 'Reserva Excluída com Sucesso');
        
    }
}

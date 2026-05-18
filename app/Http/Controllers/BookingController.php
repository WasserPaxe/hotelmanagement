<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Categorie;
use App\Models\Booking;
use App\Models\Payment;



class BookingController extends Controller
{
    public function index(){

        $rooms = Room::all();
        $customers = Customer::all();
        $categories = Categorie::all();
        $bookings = Booking::all();

        return view('admin.bookings.list.index', compact('bookings', 'customers', 'rooms','categories'));

    }

    public function create(){

        $customers = Customer::all();
        $categories =  Categorie::all();
        $rooms = Room::all();

        return view('admin.bookings.create.index', compact('rooms','categories', 'customers'));
    }

    public function store(Request $request){
        
        $bookings = new Booking();

          $validatedData = $this->validate($request,[
            'customer_id' => 'required',
            'room_id' => 'required',
            'status' => 'required',
            'checkin'=> 'required',
            'checkout' => 'required',
            'description' => 'nullable',            
            ], 
            ['customer_id.required'=>'Campo obrigatório',
            'room_id.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',
            'checkin.required'=>'Campo obrigatório',
            'checkout'=>'Campo obrigatório',
        ]); 

        $bookings->status = $request->status;
        $bookings->description = $request->description;
        $bookings->checkin = $request->checkin;
        $bookings->checkout = $request->checkout;
        $bookings->customer_id = $request->customer_id;
        $bookings->room_id = $request->room_id;

        

        $bookings = Booking::create($validatedData);
        return redirect()->back()->with(['booking_created' => true, 'booking_id'=>$bookings->id, 'room_id'=>$bookings->room->price,]);
        
    }

    public function show($id){

       
        $categories = Categorie::all();
        $rooms = Room::all();
        $bookings = Booking::findOrFail($id);
        $customers = Customer::findOrFail($bookings->customer_id);
        return view('admin.bookings.details.index', compact('bookings', 'rooms', 'customers', 'categories'));
    }

    public function edit($id){
        
      
        $categories = Categorie::all();
        $rooms = Room::all();
        
        $bookings = Booking::findOrFail($id);
        $customer = Customer::findOrFail($bookings->customer_id);
        return view('admin.bookings.edit.index', compact('bookings','customer', 'rooms','categories'));
    }

    public function update(Request $request){

        $bookings = Booking::findOrFail($request->id)->update($request->all());
        return redirect()->route('booking.index')->with('update', 'Reserva Atualizada com Sucesso');

    }

    public function destroy($id){
        $bookings = Booking::findOrFail($id)->delete();
        return redirect()->route('booking.index')->with('delete', 'Reserva Excluída com Sucesso');
        
    }
    
    public function searchCustomers(Request $request)
{
    $term = $request->get('term');
    
    // Busca clientes onde o nome contenha o termo digitado
    $customers = Customer::where('name', 'LIKE', "%{$term}%")
                         ->select('id', 'name')
                         ->limit(10) // Limita para não pesar
                         ->get();
                         
    return response()->json($customers);
}
   
}

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
        $bookings = Booking::orderBy('created_at', 'desc')->get();

        return view('admin.bookings.list.index', compact('bookings', 'customers', 'rooms','categories'));

    }

    public function create(){

        $customers = Customer::all();
        $categories =  Categorie::all();
        $rooms = Room::all();

        return view('admin.bookings.create.index', compact('rooms','categories', 'customers'));
    }

    public function store(Request $request){
        
        

          $validatedData = $this->validate($request,[
            'customer_id' => 'required',
            'room_id' => 'required',
            'status' => 'required',
            'checkin'=> 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
                       
            ], 
            ['customer_id.required'=>'Campo obrigatório',
            'room_id.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',
            'checkin.required'=>'Campo obrigatório',
            'checkin.date'=>'Insira um formato de data válida',
            'checkin.after_or_equal'=>'Coloque uma data actual ou futura', 
            'checkout'=>'Campo obrigatório',
            'checkout.after'=>'Data de saída deve ser superior a de entrada',
        ]); 

            //Guardar os dados em variaveis para facilitar a consulta
            $room_id = $request->room_id;
            $checkin = $request->checkin;
            $checkout = $request->checkout;

        
            $existsConflict = Booking::where('room_id', $room_id)//consultas nas reservas o quarto selecionado
                             ->where(function ($query) use ($checkin, $checkout){
                                $query->WhereBetween('checkin', [$checkin, $checkout])//procurar reserva se o checkin esta dentro da nova reserva
                                ->orWhereBetween('checkout', [$checkin, $checkout])//procurar reserva se o checkout esta dentro da nova reserva
                                ->orWhere(function($q) use ($checkin, $checkout){
                                    //Caso a reserva existente cubra completamente o novo periodo ex: a nova(10-15), existente(05-20)
                                    $q->where('checkin', '<=', $checkin)
                                    ->where('checkout', '>=', $checkout);
                                });
                             })
                             ->exists();//encerrar consulta e retorna true se tiver pelo menos uma reserva conflitante
                             if($existsConflict){
                                return back()->withInput()->withErrors(['room_id' => 'Este quarto não está disponível para as datas selecionadas']);
                             }
                             
        $bookings = new Booking();
        $bookings->status = $validatedData['status'];
    
        $bookings->checkin = $validatedData['checkin'];
        $bookings->checkout = $validatedData['checkout'];
        $bookings->customer_id = $validatedData['customer_id'];
        $bookings->room_id = $validatedData['room_id'];

        $bookings->save();
        return redirect()->back()->with(['booking_created' => true, 'booking_id'=>$bookings->id, 'room_id'=>$bookings->room->price,]);
        
    }

    public function show(int $id){

       
        $categories = Categorie::all();
        $rooms = Room::all();
        $bookings = Booking::findOrFail($id);
        $customers = Customer::findOrFail($bookings->customer_id);
        return view('admin.bookings.details.index', compact('bookings', 'rooms', 'customers', 'categories'));
    }

    public function edit(int $id){
        
      
        $categories = Categorie::all();
        $rooms = Room::all();
        
        $bookings = Booking::findOrFail($id);
        $customer = Customer::findOrFail($bookings->customer_id);
        return view('admin.bookings.edit.index', compact('bookings','customer', 'rooms','categories'));
    }

    public function update(Request $request){

        $validatedData = $this->validate($request,[
            'customer_id' => 'required',
            'room_id' => 'required',
            'status' => 'required',
            'checkin'=> 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
                       
            ], 
            ['customer_id.required'=>'Campo obrigatório',
            'room_id.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',
            'checkin.required'=>'Campo obrigatório',
            'checkin.date'=>'Insira um formato de data válida',
            'checkin.after_or_equal'=>'Coloque uma data actual ou futura', 
            'checkout'=>'Campo obrigatório',
            'checkout.after'=>'Data de saída deve ser superior a de entrada',
        ]); 

        


        $bookings = Booking::findOrFail($request->id)->update($request->all());
        
        return redirect()->route('booking.index')->with('update', 'Reserva Atualizada com Sucesso');

    }

    public function destroy(int $id){
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

public function search(Request $request){
        $bookings = Booking::where('checkin', 'LIKE', "%{$request->search}%")
                               ->orWhere('checkout', 'LIKE', "%{$request->search}%")
                                ->orWhere('status', 'LIKE', "%{$request->search}%")
                                ->orWhereHAs('customer', function($query) use ($request){
                                    $query->where('name', 'LIKE', "%{$request->search}%");
                                })
                                ->orWhereHAs('room', function($q) use ($request){
                                    $q->where('number', 'LIKE', "%{$request->search}%");
                                })
                                ->get();
        return view('admin.bookings.list.index', compact('bookings'));
    }
   
}

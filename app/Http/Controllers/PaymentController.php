<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Categorie;
use App\Models\Customer;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(){
        $payments = Payment::all();
        $bookings = Booking::all();
        return view('admin.payments.list.index', compact('payments', 'bookings'));
    }

    public function create(){
        $categories = Categorie::all();
        $rooms = Room::all();
        $customers = Customer::all();
        $bookings = Booking::all();
        return view('admin.payments.create.index', compact('bookings','customers', 'rooms', 'categories'));
    }

    public function store(Request $request){
           $payments = new Payment();

           $validatedData = $this->validate($request,[
            'booking_id' => 'required',
            'totalPrice' => 'required',
            'status' => 'required',
            'paymentDate'=> 'required',
            'method' => 'required', 
            'currency' => 'required',
            
            ], 
            ['booking_id.required'=>'Campo obrigatório',
            'totalPrice.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',
            'paymentDate.required'=>'Campo obrigatório',
            'method'=>'Campo obrigatório',
            'currency'=>'Campo obrigatório',
        ]);  

        $payments->booking_id = $request->booking_id;
        $payments->status = $request->status;
        $payments->currency = $request->currency;
        $payments->method = $request->method;
        $payments->paymentDate = $request->paymentDate;
        $payments->totalPrice = $request->totalPrice;
        $payments->save();

        

        return redirect()->route('payment.index')->with('success', 'Pagamento Adicionado com Sucesso');
        
    }

    
    public function show($id){
        
        $bookings = Booking::all();
        $payments = Payment::findOrFail($id);
        
        return view('admin.payments.details.index', compact('bookings', 'payments'));
    }

    
    public function edit($id){

        $payments = Payment::findOrFail($id);
         $categories = Categorie::all();
        $rooms = Room::all();
        $customers = Customer::all();
        $bookings = Booking::all();

        return view('admin.payments.edit.index', compact('categories', 'rooms', 'customers', 'bookings', 'payments'));
    }

    public function update(Request $request){

      $validatedData = $this->validate($request,[
            'booking_id' => 'required',
            'totalPrice' => 'required',
            'status' => 'required',
            'paymentDate'=> 'required',
            'method' => 'required', 
            'currency' => 'required',
            
            ], 
            ['booking_id.required'=>'Campo obrigatório',
            'totalPrice.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',
            'paymentDate.required'=>'Campo obrigatório',
            'method'=>'Campo obrigatório',
            'currency'=>'Campo obrigatório',
        ]);  

        $payments = Payment::findOrFail($request->id)->update($request->all());
        return redirect()->route('payment.index');
    }

    public function destroy($id){
        $payments = Payment::findOrFail($id);
        $payments->delete();
        return redirect()->route('payment.index');
    }
    
}

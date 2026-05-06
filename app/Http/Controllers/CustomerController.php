<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    //

    public function index(){
        
        $customers = Customer::all();
        return view('admin.customers.list.index', compact('customers'));
    }

    public function create(){
        
        return view ('admin.customers.create.index');
    }

    public function store(Request $request){

        $customers = new Customer();

         $validatedData = $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'nationality' => 'required',
            'docnumber' => 'required',
            'gender' => 'required'
        ], ['name.required'=>'Nome obrigatorio',
        ]);

        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->phone = $request->phone;
        $customers->nationality = $request->nationality;
        
        $customers->docnumber = $request->docnumber;
        $customers->gender = $request->gender;
        $customers->save();
        return redirect()->route('customer.index');
    }

    public function destroy($id){
        $customers = Customer::findOrFail($id);
        $customers->delete();
        return redirect()->route('customer.index');
    }

    public function edit($id){
        $customers = Customer::findOrFail($id);
        return view('admin.customers.edit.index', compact('customers'));
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Customer;

class CustomerController extends Controller
{
    //

    public function index(){
        
        $customers = Customer::latest()->get();
        return view('admin.customers.list.index', compact('customers'));
    }

    public function create(){
        
        return view ('admin.customers.create.index');
    }

    public function store(Request $request){

        $customers = new Customer();

         $validatedData = $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'docnumber' => 'required',
            'gender' => 'required'], 
            
            ['name.required'=>'Campo obrigatório',
            'phone.required'=>'Campo obrigatório',
            'docnumber.required'=>'Campo obrigatório',
            'gender.required'=>'Campo obrigatório',

        ]);

        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->phone = $request->phone;
        $customers->nationality = $request->nationality;
        
        $customers->docnumber = $request->docnumber;
        $customers->gender = $request->gender;
        $customers->save();
        
        return redirect()->route('customer.index')->with('success', 'Cliente Adicionado Com Sucesso');
    }

    public function show($id){
        
        $customers = Customer::findOrFail($id);
        return view('admin.customers.details.index', compact('customers'));
    }

    

    public function edit($id){
        
        $customers = Customer::findOrFail($id);
        return view('admin.customers.edit.index', compact('customers'));
    }

    public function update(Request $request){
        
        $validatedData = $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'docnumber' => 'required',
            'gender' => 'required'], 
            
            ['name.required'=>'Campo obrigatório',
            'phone.required'=>'Campo obrigatório',
            'docnumber.required'=>'Campo obrigatório',
            'gender.required'=>'Campo obrigatório',

        ]);

        $customers = Customer::findOrFail($request->id)->update($request->all());
        return redirect()->route('customer.index')->with('update', 'Cliente Atualizado Com Sucesso');

    }

    public function destroy($id){
        $customers = Customer::findOrFail($id);
        $customers->delete();
        return redirect()->route('customer.index')->with('delete', 'Cliente Excluído Com Sucesso');
    }

    public function search(Request $request){
        $customers = Customer::where('name', 'LIKE', "%{$request->search}%")
                                ->orWhere('docnumber', 'LIKE', "%{$request->search}%")
                                ->orWhere('phone', 'LIKE', "%{$request->search}%")
                                ->orWhere('gender', 'LIKE', "%{$request->search}%")
                                ->orWhere('email', 'LIKE', "%{$request->search}%")
                                ->orWhere('nationality', 'LIKE', "%{$request->search}%")
                                ->get();
        return view('admin.customers.list.index', compact('customers'));
    }

    public function createDetailPdf($id){
        $customers = Customer::findOrFail($id);
        $pdf = PDF::loadview('pdfs.customers.details.index', compact('customers'));
        return $pdf->download('customer.pdf');
    }

    public function createListPdf(){
        $customers = Customer::all();
        $totalMens = Customer::where('gender', 'Masculino')->count();
        $totalWomens = Customer::where('gender', 'Feminino')->count();
        $totalCustomers = Customer::count();
        $nationalityCustomers = Customer::select('nationality', DB::raw('count(*)as total'))->groupBy('nationality')->orderByDesc('total')->first();
        $genderCustomers = Customer::select('gender', DB::raw('count(*)as total'))->groupBy('gender')->orderByDesc('total')->first();
        $pdf = PDF::loadview('pdfs.customers.list.index', compact('customers', 'totalCustomers', 'nationalityCustomers', 'genderCustomers', 'totalMens', 'totalWomens'));
        return $pdf->download('AllCustomer.pdf');
    }
    
}

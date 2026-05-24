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
        
        $totalCustomers = Customer::count();
        $customers = Customer::orderBy('created_at', 'desc')->get();;
       
        return view('admin.customers.list.index', compact('customers', 'totalCustomers'));
    }

    public function create(){
        
        return view ('admin.customers.create.index');
    }

    public function store(Request $request){

        $customers = new Customer();

         $validatedData = $this->validate($request,[
            'name' => 'required|string| max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => ['required', 'regex:/^\+[0-9]{1,3}[0-9]{7,14}$/'],
            'nationality' => 'required',
            'docnumber' => ['required', 'string', 'regex:/^([0-9]{9}[A-Z]{2}[0-9]{3}| [A-Z0-9]{6,12})$/', 'unique:customers,docnumber','max:20'],
            'gender' => 'required'], 
            
            ['name.required'=>'Campo obrigatório',
            'email.required'=> 'Campo Obrigatório',
            'email.email'=> 'Digite um email válido',
            'email.unique' => 'Este email já está cadastrado',
            'phone.required'=>'Campo obrigatório',
            'phone.regex' => 'Digite um formato de telefone válido (ex.:(+244 9XXXXXXXX))',
            'docnumber.required'=>'Campo obrigatório',
            'docnumber.regex'=> 'Digite formato de BI ou Passaporte válido',
            'docnumber.unique'=> 'Este documento já está cadastrado',
            'docnumber.max' => 'O documento deve ter no máximo 20 caracteres',
            'gender.required'=>'Campo obrigatório',

        ]);

        $customers->name = $validatedData['name'];
        $customers->email = $validatedData['email'];
        $customers->phone = $validatedData['phone'];
        $customers->nationality = $validatedData['nationality'];
        
        $customers->docnumber = $validatedData['docnumber'];
        $customers->gender = $validatedData['gender'];
        $customers->save();
        
        return redirect()->route('customer.index')->with('success', 'Cliente Adicionado Com Sucesso');
    }

    public function show(int $id){
        
        $customers = Customer::findOrFail($id);
        return view('admin.customers.details.index', compact('customers'));
    }

    

    public function edit(int $id){
        
        $customers = Customer::findOrFail($id);
        return view('admin.customers.edit.index', compact('customers'));
    }

    public function update(Request $request){
        
        $validatedData = $this->validate($request,[
            'name' => 'required|string| max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => ['required', 'regex:/^\+[0-9]{1,3}[0-9]{7,14}$/'],
            'nationality' => 'required',
            'docnumber' => ['required', 'string', 'regex:/^([0-9]{9}[A-Z]{2}[0-9]{3}| [A-Z0-9]{6,12})$/', 'unique:customers,docnumber','max:20'],
            'gender' => 'required'], 
            
            ['name.required'=>'Campo obrigatório',
            'email.required'=> 'Campo Obrigatório',
            'email.email'=> 'Digite um email válido',
            'email.unique' => 'Este email já está cadastrado',
            'phone.required'=>'Campo obrigatório',
            'phone.regex' => 'Digite um formato de telefone válido (ex.:(+244 9XXXXXXXX))',
            'docnumber.required'=>'Campo obrigatório',
            'docnumber.regex'=> 'Digite formato de BI ou Passaporte válido',
            'docnumber.unique'=> 'Este documento já está cadastrado',
            'docnumber.max' => 'O documento deve ter no máximo 20 caracteres',
            'gender.required'=>'Campo obrigatório',

        ]);

        $customers = Customer::findOrFail($request->id)->update($request->all());
        return redirect()->route('customer.index')->with('update', 'Cliente Atualizado Com Sucesso');

    }

    public function destroy(int $id){
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

    public function createDetailPdf(int $id){
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

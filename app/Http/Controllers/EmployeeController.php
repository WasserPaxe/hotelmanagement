<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::orderBy('created_at', 'desc')->get();;

        return view('admin.employees.list.index', compact('employees'));
    }

    public function create(){
        return view('admin.employees.create.index');
    }

    public function store(Request $request){
        $employees = new Employee();

         $validatedData = $this->validate($request,[
            'name' => 'required',
            'identification' => 'required',
            'department' => 'required',
            'role' => 'required',
            'admission' => 'required',
            'status' => 'required'
            ], 
            
            ['name.required'=>'Campo obrigatório',
            'identification.required'=>'Campo obrigatório',
            'department.required'=>'Campo obrigatório',
            'role.required'=>'Campo obrigatório',
            'admission.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',

        ]);

        $employees->name = $request->name;
        $employees->email = $request->email;
        $employees->phone = $request->phone;
        $employees->role = $request->role;
        
        $employees->identification = $request->identification;
        $employees->department = $request->department;
        $employees->admission = $request->admission;
        $employees->status = $request->status;
        $employees->save();
        
        return redirect()->route('employees.index')->with('success', 'Funcionário Adicionado Com Sucesso');
    }

    public function show($id){
        $employees = Employee::findOrFail($id);
        return view('admin.employees.details.index', compact('employees'));
    }

    public function edit($id){
        $employees = Employee::findOrFail($id);
        return view('admin.employees.edit.index', compact('employees'));
    }

    public function update(Request $request){

        $validatedData = $this->validate($request,[
            'name' => 'required',
            'identification' => 'required',
            'department' => 'required',
            'role' => 'required',
            'admission' => 'required',
            'status' => 'required'
            ], 
            
            ['name.required'=>'Campo obrigatório',
            'identification.required'=>'Campo obrigatório',
            'department.required'=>'Campo obrigatório',
            'role.required'=>'Campo obrigatório',
            'admission.required'=>'Campo obrigatório',
            'status.required'=>'Campo obrigatório',

        ]);

        $employees = Employee::findOrFail($request->id)->update($request->all());

        return redirect()->route('employees.index')->with('update', 'Funcionário Atualizado Com Sucesso');
    }

    public function destroy($id){
        $employees = Employee::findOrFail($id);
        $employees->delete();
        return redirect()->route('employees.index')->with('delete', 'Cliente Excluído Com Sucesso');
    }
}

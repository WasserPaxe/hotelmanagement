@extends('layouts.admin.main')
@section('title','Detalhes')
@section('content')
 <div class="row">
    <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Funcionário</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('employees.show', $employees->id) }}">Detalhes Funcionário</a></li>
                                        </ol>
                                    </div>
                                 
                                </div>
    
                        <div class="col-sm-12 mt-2">
                            <div class="card p-0">
                                <div class="card-body p-0">
                                    <div class="profile-content">
                                        

                                        <div class="tab-content m-0 p-4">
                                            <div class="tab-pane active" id="aboutme" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <div class="profile-desk">
                                                   <h5 class=" fs-17 text-dark"> Sr.(a) {{ $employees->name }}</h5>
                                                    
                                                   

                                                    <h5 class="mt-4 fs-17 text-dark">Detalhes</h5>
                                                    <table class="table table-condensed mb-0 border-top">
                                                        <tbody>
                                                            <tr>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Departamento</th>
                                                                <td>
                                                                    {{ $employees->department }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Função</th>
                                                                <td class="ng-binding">{{ $employees->role }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Estado</th>
                                                                <td>
                                                                  {{ $employees->status }}  
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <th scope="row">Telemóvel</th>
                                                                <td>
                                                                    {{ $employees->phone }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Email</th>
                                                                <td>
                                                                    {{ $employees->email }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Data de Admissão</th>
                                                                <td>
                                                                    {{ $employees->admission }}
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
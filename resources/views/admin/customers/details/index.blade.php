@extends('layouts.admin.main')
@section('title','Detalhes')
@section('content')
 <div class="row">
    <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Utente</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('customer.show', $customers->id) }}">Detalhes Utente</a></li>
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
                                                   <h5 class=" fs-17 text-dark"> Sr.(a) {{ $customers->name }}</h5>
                                                    
                                                   

                                                    <h5 class="mt-4 fs-17 text-dark">Detalhes</h5>
                                                    <table class="table table-condensed mb-0 border-top">
                                                        <tbody>
                                                            <tr>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Email</th>
                                                                <td>
                                                                    {{ $customers->email }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Phone</th>
                                                                <td class="ng-binding">{{ $customers->phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Nacionalidade</th>
                                                                <td>
                                                                  {{ $customers->nationality }}  
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <th scope="row">Bilhete de Identidade/Passaporte</th>
                                                                <td>
                                                                    {{ $customers->docnumber }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Gênero</th>
                                                                <td>
                                                                    {{ $customers->gender }}
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
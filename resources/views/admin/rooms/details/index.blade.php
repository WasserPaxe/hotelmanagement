@extends('layouts.admin.main')
@section('title', 'Detalhes Quarto')
@section('content')

<div class="row">
    <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Quartos</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('room.show', $rooms->id) }}">Detalhes Quarto</a></li>
                                            
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
                                                    <h5 class="text-uppercase fs-17 text-dark">Quarto {{ $rooms->number }}</h5>
                                                    
                                                   

                                                    <h5 class="mt-4 fs-17 text-dark">Detalhes</h5>
                                                    <table class="table table-condensed mb-0 border-top">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <th scope="row">Andar</th>
                                                                <td>
                                                                    {{ $rooms->floor }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Categoria</th>
                                                                <td class="ng-binding">{{$rooms->categorie->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Condições</th>
                                                                <td>
                                                                  {{ $rooms->conditions }}  
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <th scope="row">Estado</th>
                                                                <td>
                                                                    {{ $rooms->status }}
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
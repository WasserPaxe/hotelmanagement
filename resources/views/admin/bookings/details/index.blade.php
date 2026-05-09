@extends('layouts.admin.main')
@section('title', 'Detalhes Reservas')
@section('content')

<div class="row">
    <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Reservas</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('booking.show', $bookings->id) }}">Detalhes da Reserva</a></li>
                                            
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
                                                    <h5 class="text-uppercase fs-17 text-dark">Reserva Nº {{ $bookings->id }} </h5>
                                                    
                                                   

                                                    <h5 class="mt-4 fs-17 text-dark">Detalhes</h5>
                                                    <table class="table table-condensed mb-0 border-top">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <th scope="row">Sr.(a)</th>
                                                                <td>
                                                                    {{ $bookings->customer->name }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Nacionalidade</th>
                                                                <td>
                                                                    {{ $bookings->customer->nationality }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Telemovel</th>
                                                                <td>
                                                                    {{ $bookings->customer->phone }}
                                                                </td>
                                                            </tr>
                                                          
                                                                <th scope="row">Quarto </th>
                                                                <td>
                                                                    {{ $bookings->room->number }}
                                                                </td>
                                                            </tr>
                                                        

                                       
                                                            <tr>
                                                                <th scope="row">Categoria </th>
                                                                <td>
                                                                    {{ $bookings->room->categorie->name }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Check IN</th>
                                                                <td>
                                                                   {{ $bookings->checkin }}
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <th scope="row">Check Out</th>
                                                                <td>
                                                                    {{ $bookings->checkout }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Descricao</th>
                                                                <td>
                                                                    {{ $bookings->description }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Estado</th>
                                                                <td>
                                                                    {{ $bookings->status }}
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
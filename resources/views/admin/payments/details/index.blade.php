@extends('layouts.admin.main')
@section('title','Detalhes Pagamento')
@section('content')
 <div class="row">
    <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Utente</a></li>
                                            <li class="breadcrumb-item active"><a href="{{-- {{ route('customer.show', $customers->id) }} --}}">Detalhes Pagamento</a></li>
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
                                                   <h5 class=" fs-17 text-dark"></h5>
                                                    
                                                   

                                                    <h5 class="mt-4 fs-17 text-dark">Detalhes</h5>
                                                    <table class="table table-condensed mb-0 border-top">
                                                        <tbody>
                                                            <tr>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Nome Cliente</th>
                                                                <td>
                                                                    {{$payments->booking->customer->name}}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Booking ID</th>
                                                                <td>
                                                                    {{$payments->booking->id}}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Quarto</th>
                                                                <td>
                                                                    {{$payments->booking->room->number}}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Valor Total</th>
                                                                <td>
                                                                    {{$payments->booking->room->price}}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Data de Pagamento</th>
                                                                <td>
                                                                    {{$payments->paymentDate}}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Método</th>
                                                                <td>
                                                                    {{$payments->method}}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Moeda</th>
                                                                <td>
                                                                    {{$payments->currency}}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Estado</th>
                                                                <td>
                                                                    {{$payments->status}}
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
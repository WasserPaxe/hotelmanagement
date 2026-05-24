@extends('layouts.admin.main')
@section('title','Detalhes Pagamento')
@section('content')

<div class="col-12">
                                <div class="card mt-2">
                                    <div class="card-body">

                                        <!-- Invoice Logo-->
                                        <div class="clearfix">
                                            <div class="float-start mb-3">
                                                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo" height="22">
                                            </div>
                                            <div class="float-end">
                                                <h4 class="m-0 d-print-none">Factura</h4>
                                            </div>
                                        </div>

                                        <!-- Invoice Detail-->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="float-end mt-3">
                                                    <p><b>Olá, {{$payments->booking->customer->name}}</b></p>
                                                    <p class="text-muted fs-13">Por favor depois de receber a factura lê atentamente de modo a efectuar eventuais reclamações de modo a evitar constragimentos futuros, obrigado!.</p>
                                                </div>
            
                                            </div><!-- end col -->
                                            <div class="col-sm-4 offset-sm-2">
                                                <div class="mt-3 float-sm-end">
                                                    <p class="fs-13"><strong>Dia de Pagamento: </strong> &nbsp;&nbsp;&nbsp; {{$payments->paymentDate}}</p>
                                                    <p class="fs-13"><strong>Estado de Pagamento: </strong> <span class="badge bg-success float-end">{{$payments->status}}</span></p>
                                                    <p class="fs-13"><strong>ID da Reserva: </strong> <span class="float-end">#{{$payments->booking->id}}</span></p>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->
            
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <h6 class="fs-14">Endereço</h6>
                                                <address>
                                                    Luanda, Angola<br>
                                                    Maculusso, Bairro Espiríto Santo<br>
                                                    Rua Francisco Saldanha, 057<br>
                                                    <abbr title="Phone">Telefone:</abbr> (+244) 938-645-258
                                                </address>
                                            </div> <!-- end col-->
            
                                             <!-- end col-->
                                        </div>    
                                        <!-- end row -->        
    
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-centered table-hover table-borderless mb-0 mt-3">
                                                        <thead class="border-top border-bottom bg-light-subtle border-light">
                                                        <tr><th>#</th>
                                                            <th>Item</th>
                                                            <th>Dias</th>
                                                            <th>Preço por Dia</th>
                                                            <th>Moeda</th>
                                                            <th>Método de Pagamento</th>
                                                            <th class="text-end">Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                        <tr>
                                                            <td class=""></td>
                                                            <td>
                                                                <b>Quarto {{$payments->booking->room->number}}</b> <br/>
                                                                
                                                            </td>
                                                            <td>{{$payments->days}}</td>
                                                            <td>{{$payments->booking->room->price}}</td>
                                                            <td>{{$payments->currency}}</td>
                                                            <td>{{$payments->method}}</td>
                                                            <td class="text-end">{{$payments->totalPrice }}</td>
                                                        </tr>
                                                        
    
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end table-responsive-->
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="clearfix pt-3">
                                                    <h6 class="text-muted fs-14">Obs: {{$payments->obs}}</h6>
                                                    <small>
                                                         
                                                    </small>
                                                </div>
                                            </div> <!-- end col -->
                                             <!-- end col -->
                                        </div>
                                        <!-- end row-->
    
                                        <div class="d-print-none mt-4">
                                            <div class="text-center">
                                                <a href="javascript:window.print()" class="btn btn-primary"><i class="ri-printer-line"></i> Print</a>
                                                
                                            </div>
                                        </div>   
                                        <!-- end buttons -->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card -->
                            </div>
   

                    
@endsection
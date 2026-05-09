@extends('layouts.admin.main')
@section('title', 'Criar Reserva')
@section('content')

<div class="row">
    <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Reservas</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('booking.create') }}">Adicionar Reserva</a></li>
                                        </ol>
                                    </div>
                                 
                                </div>
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Reserva</h4>
                                    
                                </div>
                           
                                <div class="card-body">
                                    <form method="POST" action=" {{ route('booking.store') }}">
                                        @csrf
                                        @include('forms.admin._formBooking.index')
                                    </form>    
                                        </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div><!-- end col -->
                    </div>

@endsection
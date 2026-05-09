@extends('layouts.admin.main')
@section('title', 'Editar Utentes')
@section('content')

<div class="row">
        <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Utentes</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('customer.edit', $customers->id) }}">Editar Utente</a></li>
                                        </ol>
                                    </div>
                                </div>
                        <div class="col-12 mt-2">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Utentes</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('customer.update', $customers->id) }}">
                                        @csrf
                                        @method('PUT')
                                        @include('forms.admin._formCustomer.index')
                                    </form>    
                                        </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div><!-- end col -->
                    </div>

@endsection

@extends('layouts.admin.main')
@section('title', 'Editar Tipos de Sala')
@section('content')

<div class="row">
    <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Tipos de Sala</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('typespace.edit', $typespaces->id) }}">Editar Tipos de Sala</a></li>
                                            
                                        </ol>
                                    </div>
                                </div>
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Editar Tipo de Sala</h4>
                                    
                                </div>
                           
                                <div class="card-body">
                                    <form method="POST" action="{{ route('typespace.update', $typespaces->id) }}">
                                        @method('PUT')
                                        @csrf
                                        @include('forms.admin._formTypespace.index')
                                    </form>    
                                        </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div><!-- end col -->
                    </div>

@endsection
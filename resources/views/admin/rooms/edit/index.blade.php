@extends('layouts.admin.main')
@section('title', 'Editar Quarto')
@section('content')

<div class="row">
    <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Quartos</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('room.edit', $rooms->id) }}">Editar Quarto</a></li>
                                            
                                        </ol>
                                    </div>
                                 
                                </div>
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Quarto</h4>
                                    
                                </div>
                           
                                <div class="card-body">
                                    <form method="POST" action="{{ route('room.update',$rooms->id ) }}">
                                        
                                        @csrf
                                        @method('PUT')
                                        @include('forms.admin._formRoom.index')
                                    </form>    
                                        </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div><!-- end col -->
                    </div>

@endsection
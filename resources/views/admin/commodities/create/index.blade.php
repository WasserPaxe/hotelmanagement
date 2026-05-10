@extends('layouts.admin.main')
@section('title', 'Adicionar Comodidade')
@section('content')

<div class="row">
    <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Comodidade</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('commodity.create') }}">Adicionar Comodidade</a></li>
                                            
                                        </ol>
                                    </div>
                                 
                                </div>
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Comodidade</h4>
                                    
                                </div>
                           
                                <div class="card-body">
                                    <form method="POST" action="{{ route('commodity.store') }}">
                                        @csrf
                                        @include('forms.admin._formCommodity.index')
                                    </form>    
                                        </div>
                                </div> 
                            </div> 
                        </div>
                    </div>

@endsection

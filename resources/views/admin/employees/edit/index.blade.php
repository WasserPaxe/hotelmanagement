@extends('layouts.admin.main')
@section('title', 'Editar Funcionário')
@section('content')

<div class="row">
        <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Funcionário</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('employees.edit', $employees->id) }}">Editar Funcionário</a></li>
                                        </ol>
                                    </div>
                                </div>
                        <div class="col-12 mt-2">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Funcionário</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('employees.update', $employees->id) }}">
                                        @csrf
                                        @method('PUT')
                                        @include('forms.admin._formEmployee.index')
                                    </form>    
                                        </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div><!-- end col -->
                    </div>

@endsection
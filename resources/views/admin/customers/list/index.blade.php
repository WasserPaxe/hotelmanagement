@extends('layouts.admin.main')
@section('title', 'Listar Utentes')
@section('content')

<div class="row">

    
                        
                                 <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Utentes</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('customer.index') }}">Listar Utentes</a></li>
                                        </ol>
                                        
                                    </div>
                                </div>
                        
                        

                        <div class="col-12">
                            
                            
                            <div class="card mt-2">
                                @if(session('success'))
                                 <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <span >{{session('success')}}</span>
                                </div>
                                @elseif (session('update'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <span >{{session('update')}}</span>
                                </div>
                                @elseif (session('delete'))
                                <div class="alert alert-pink alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <span >{{session('delete')}}</span>
                                </div>
                                @endif
                                

                                <div class="card-header">
                                    <h4 class="header-title">Todos Utentes</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                        <div class="dt-buttons btn-group flex-wrap"> 
                                                @if(isset($customers))
                                                    <a href="{{ route('customerList.pdf') }}"><button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="datatable-buttons" type="button">Relatório</button> </a>

                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 text-md-end"><div id="datatable-buttons_filter" class="dataTables_filter">
                                            <form action="{{ route('customer.search') }}" method="POST">
                                                @csrf
                                                <label>
                                                    <input type="search" name="search" class="form-control form-control-sm" placeholder="Filtro..." aria-controls="datatable-buttons">
                                                </label>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Nacionalidade</th>
                                                <th>Nº Documento</th>
                                                <th>Gênero</th>
                                                <th>Acções </th>
                                            </tr>
                                        </thead>

                                       @forelse($customers as $customer)     
                                        <tbody>
                                            <tr>
                                                <td>{{$customer->name}}</td>
                                                <td>{{$customer->email}}</td>
                                                <td>{{$customer->phone}}</td>
                                                <td>{{$customer->nationality}}</td>                  
                                                <td>{{$customer->docnumber}}</td>
                                                <td>{{ $customer->gender }}</td>
                                                <td>
                                                    
                                                    <a href="{{ route('customer.show', $customer->id) }}" ><button  class="btn btn-outline-info"><i class="bi bi-eye"></i></button></a>
                                                    <a href="{{ route('customerDetail.pdf', $customer->id) }}" ><button  class="btn btn-pink"><i class="bi bi-file-pdf-fill"></i></button></a>
                                                    <a href="{{ route('customer.edit', $customer->id) }}" ><button  class="btn btn-primary"><i class="bi bi-pencil"></i></button> </a>
                                                    <form style="display:inline" method="POST" action="{{ route('customer.delete', $customer->id) }}">@method('DELETE') @csrf <button  class="btn btn-danger"><i class="bi bi-trash"></i></button> </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @empty
                                        
                                            <tr>
                                                <td colspan="12" class="text-center"> Sem Clientes Cadastrados</td>
                                            </tr>
                                        
                                        @endforelse
                                        
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div>
                        
                        <!-- end col-->
                        
                    </div> 
                    
                    

@endsection



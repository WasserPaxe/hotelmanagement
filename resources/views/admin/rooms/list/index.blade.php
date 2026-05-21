@extends('layouts.admin.main')
@section('title', 'Listar Quartos')
@section('content')

<div class="row">
   <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Quartos</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('room.index') }}">Listar Quartos</a></li>
                                            
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
                                    <h4 class="header-title">Todos Quartos</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                        <div class="dt-buttons btn-group flex-wrap"> 
                                                
                                                <a href="{{ route('roomList.pdf') }}"><button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="datatable-buttons" type="button"><i class="bi bi-file-pdf-fill"></i></button> </a> 
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 text-md-end"><div id="datatable-buttons_filter" class="dataTables_filter">
                                            <form action="{{ route('room.search') }}" method="POST">
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
                                                <th>Numero</th>
                                                <th>Piso</th>
                                                <th>Telefone</th>
                                                <th>Categoria</th>
                                                <th>Camas</th>
                                                <th>Refeição</th>
                                                <th>Descrição</th>
                                                <th>Preço</th>
                                                <th>Estado</th>
                                                <th>Acções </th>
                                            </tr>
                                        </thead>

                                       @forelse($rooms as $room)     
                                        <tbody>
                                            <tr>
                                                
                                                <td>{{$room->name}}</td>
                                                <td>{{$room->number}}</td>
                                                <td>{{$room->floor}}</td>
                                                <td>{{$room->phone}}</td>
                                                <td>{{$room->categorie->name}}</td>
                                                <td>{{$room->bed}}</td>
                                                <td>{{ $room->meal }}</td>
                                                <td style="max-width:150px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                                    {{$room->description}}
                                                </td>
                                                <td>{{$room->price}}</td>
                                                <td>{{$room->status}}</td>
                                               
                                                <td>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <a href="{{ route('room.show', $room->id) }}" ><button  class="btn btn-outline-info"><i class="bi bi-eye"></i></button></a>
                                                        <a href="{{ route('roomDetail.pdf', $room->id) }}" ><button  class="btn btn-pink"><i class="bi bi-file-pdf-fill"></i></button></a>
                                                        <a href="{{ route('room.edit', $room->id) }}" ><button  class="btn btn-primary"><i class="bi bi-pencil"></i></button> </a>
                                                        <form class="m-0 p-0" method="POST" action="{{ route('room.delete', $room->id) }}">@method('DELETE') @csrf <button  class="btn btn-danger"><i class="bi bi-trash"></i> </button> </form>
                                                    </div>    
                                                </td>
                                            
                                            </tr>
                                        </tbody>
                                        @empty
                                        @endforelse
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> 

@endsection
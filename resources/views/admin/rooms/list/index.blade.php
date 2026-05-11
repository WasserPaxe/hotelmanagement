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
                                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Numero</th>
                                                <th>Piso</th>
                                                <th>Categoria</th>
                                                <th>Descrição</th>
                                                <th>Estado</th>
                                                <th>Acções </th>
                                            </tr>
                                        </thead>

                                       @forelse($rooms as $room)     
                                        <tbody>
                                            <tr>
                                                <td>{{$room->number}}</td>
                                                <td>{{$room->floor}}</td>
                                                <td>{{$room->categorie->name}}</td>
                                                <td>{{$room->description}}</td>
                                                <td>{{$room->status}}</td>
                                               
                                                <td>
                                                    <a href="{{ route('room.show', $room->id) }}" ><button  class="btn btn-outline-info"><i class="bi bi-eye"></i></button></a>
                                                    <a href="{{ route('room.edit', $room->id) }}" ><button  class="btn btn-primary"><i class="bi bi-pencil"></i></button> </a>
                                                    <form style="display:inline" method="POST" action="{{ route('room.delete', $room->id) }}">@method('DELETE') @csrf <button  class="btn btn-danger"><i class="bi bi-trash"></i> </button> </form>
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
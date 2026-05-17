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
                                                <th>Imagem</th>
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
                                                <td>
                                                    @if($room->image)
                                                    <img src="{{ asset('storage/' . $room->image)}}" style="max-width: 40px; width:100%;  height: auto; object-fit:cover; " class="img-fluid" >
                                                    @endif
                                                </td>
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
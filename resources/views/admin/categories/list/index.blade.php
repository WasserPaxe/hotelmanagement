@extends('layouts.admin.main')
@section('title', 'Listar Categorias')
@section('content')

<div class="row">

    <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="">Categorias</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('categorie.index') }}">Listar Categoria</a></li>
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
                                    <h4 class="header-title">Todas Categorias</h4>
                                </div>
                                <div class="card-body">
                                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                
                                                <th>Acções </th>
                                            </tr>
                                        </thead>

                                       @forelse($categories as $categorie)     
                                        <tbody>
                                            <tr>
                                                <td>{{$categorie->name}}</td>
                                                
                                                <td>
                                                    <a href="{{ route('categorie.edit', $categorie->id) }}" ><button  class="btn btn-primary"><i class="bi bi-pencil"></i></button> </a>
                                                    <form style="display:inline" method="POST" action={{ route('categorie.delete', $categorie->id) }}"">@method('DELETE') @csrf <button  class="btn btn-danger"><i class="bi bi-trash"></i></button> </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center"> Sem Categorias</td>
                                            </tr>
                                        @endforelse
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> 

@endsection
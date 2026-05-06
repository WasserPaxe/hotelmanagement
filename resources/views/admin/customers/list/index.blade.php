@extends('layouts.admin.main')
@section('title', 'Listar Utentes')
@section('content')

<div class="row">

                        <div class="col-12">
                            
                            
                            <div class="card mt-2">
                                @if(session('success'))
                                 <div id="flash-message" class="card-header bg-danger text-dark">
                                    <span >{{session('success')}}</span>
                                </div>
                                 <script>
                                    setTimeout(() => {
                                    const msg = document.getElementById('flash-message');
                                        if (msg) msg.remove();}, 1000);
                                    </script>
                                @elseif(session('update'))
                                 <div id="flash-message" class="card-header bg-primary text-dark">
                                    <span >{{session('update')}}</span>
                                </div>
                                
                                 <script>
                                    setTimeout(() => {
                                    const msg = document.getElementById('flash-message');
                                        if (msg) msg.remove();}, 1000);
                                    </script>
                                @endif
                                

                                <div class="card-header">
                                    <h4 class="header-title">Todos Utentes</h4>
                                </div>
                                <div class="card-body">
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
                                                    <a href="{{ route('customer.edit', $customer->id) }}" ><button  class="btn btn-primary">Editar</button> </a>
                                                    <form style="display:inline" method="POST" action="{{ route('customer.delete', $customer->id) }}">@method('DELETE') @csrf <button  class="btn btn-danger">Excluir</button> </form>
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
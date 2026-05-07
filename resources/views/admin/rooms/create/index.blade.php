@extends('layouts.admin.main')
@section('title', 'Adicionar Quarto')
@section('content')

<div class="row">
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Quarto</h4>
                                    
                                </div>
                           
                                <div class="card-body">
                                    <form method="POST" action="{{ route('room.store') }}">
                                        @csrf
                                        @include('forms.admin._formRoom.index')
                                    </form>    
                                        </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div><!-- end col -->
                    </div>

@endsection
@extends('layouts.admin.main')
@section('title', 'Pacotes')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('categorie.price') }}">Pacotes</a></li>
                            
                        </ol>
                    </div>
                    <h4 class="page-title">Pacotes</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row justify-content-center">
            <div class="col-xxl-10">

                <!-- Pricing Title-->
                <div class="text-center">
                    <h3 class="mb-2">Nossos <b>Pacotes</b></h3>
                    <p class="text-muted mb-5">
                       Bem-vindo à nossa seleção de pacotes. Descubra coleções de experiências criadas para elevar a sua estadia.
                    </p>
                </div>

                <!-- Plans -->
                <div class="row justify-content-center my-3">
                    @forelse ($categories as $categorie)
                        
                    <div class="col-lg-3">
                        <div
                            class="card rounded-top-0 border-3 border-end-0 border-start-0 border-bottom-0 border-top border-success">
                            <div class="card-body border-bottom p-3">
                                <span
                                    class="badge bg-success-subtle rounded-1 text-success text-uppercase fs-12 fw-semibold px-2 py-1 mb-3">
                                    {{$categorie->name}}</span>
                                <h2 class="mb-4 text-dark"><span class="text-uppercase fs-14 "></span></h2>
                                    {{ $categorie->description }}
                                
                            </div>
                        </div> <!-- end Pricing_card -->
                    </div>
                    @empty
                        Sem Pacotes
                    @endforelse <!-- end col -->

                     <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div>


@endsection

@extends('layouts.admin.main')
@section('title', 'Adicionar Utentes')
@section('content')

<div class="row">
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Utentes</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="name" id="floatingInput">
                                                    <label for="floatingInput">Nome</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="password" name="phone" class="form-control" id="floatingPassword"
                                                        placeholder="Password">
                                                    <label for="floatingPassword">Telemovel</label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" name="doctype" for="inputGroupSelect01">Tipo de Documento</label>
                                                    <select class="form-select" id="inputGroupSelect01">
                                                        <option selected>Selecione</option>
                                                        <option value="1">Bilhete</option>
                                                        <option value="2">Passaporte</option>
                                                        <option value="3">Outro</option>
                                                    </select>
                                                </div>

                                                <h6 class="fs-15 mt-3">Genero</h6>

                                        <div class="mt-3">
                                            <div class="form-check">
                                                <input type="radio" id="customRadio1" name="customRadio"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="customRadio1">Masculino</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="customRadio"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="customRadio2">Feminino</label>
                                            </div>
                                        </div>

                                            </div>

                                            <div class="col-lg-6">
                                                
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" name="email" id="floatingInput">
                                                    <label for="floatingInput">Email</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" id="floatingPassword"
                                                        placeholder="Password">
                                                    <label for="floatingPassword">Nacionalidade</label>
                                                </div>
                                                
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" id="floatingPassword"
                                                        placeholder="Password">
                                                    <label for="floatingPassword">Nº Documento</label>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary m-2">Submit</button>
                                            </div>

                                        </form>    
                                        </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div><!-- end col -->
                    </div>

@endsection

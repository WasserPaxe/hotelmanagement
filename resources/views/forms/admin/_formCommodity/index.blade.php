<div class="row">
                                            <div class="col-lg-6">
                                                
                                                <div class="mb-3">
                                                    <label for="simpleinput" name="name" class="form-label">Nome</label>
                                                    <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', $commodities->name ?? '') }}">
                                                        @error('name')
                                                            <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                        @enderror
                                                </div>            
                                            </div>

                                            <div class="col-lg-6">
                                                
                                                <div class="mb-3">
                                                    <label for="simpleinput" name="price" class="form-label">Preço</label>
                                                    <input type="text" id="title" name="price" class="form-control @error('price') is-invalid @enderror"  value="{{ old('price', $commodities->price ?? '') }}">
                                                        @error('price')
                                                            <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                        @enderror
                                                </div>            
                                            </div>

                                            
                                        @if(isset($commodities))
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Atualizar</button>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Adicionar</button>
                                            </div>
                                        @endif

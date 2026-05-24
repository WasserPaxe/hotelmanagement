<div class="row">
                                            <div class="col-lg-6">
                                                
                                                <div class="mb-3">
                                                    <label for="simpleinput" name="name" class="form-label">Nome</label>
                                                    <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', $categories->name ?? '') }}">
                                                        @error('name')
                                                            <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                        @enderror
                                                </div> 
                                                            
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="example-textarea" name="categories" class="form-label">Descricao</label>
                                                    <textarea class="form-control" name="categories" value="{{ old('description', $categories->description ?? '') }}" id="example-textarea"></textarea>
                                               </div>
                                            </div>

                                             

                                            
                                        @if(isset($categories))
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Atualizar</button>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Adicionar</button>
                                            </div>
                                        @endif

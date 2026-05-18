<div class="row">
                                            <div class="col-lg-6">

                                                
                                                <div class="mb-3">
                                                    <label for="simpleinput" name="number" class="form-label">Número do Quarto</label>
                                                    <input type="text" id="title" name="number" class="form-control  @error('number') is-invalid @enderror"  value="{{ old('number', $rooms->number ?? '') }}">
                                                        @error('number')
                                                            <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                        @enderror 
                                                </div>
                                               
                                                <div class="mb-3">
                                                    <label for="text" class="form-label">Andar</label>
                                                    <input type="text" id="example-email" name="floor" class="form-control" placeholder="" value="{{ old('rooms', $rooms->floor ?? '') }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="simpleinput" name="meal" class="form-label">Refeição</label>
                                                    <input type="text" id="title" name="meal" class="form-control  @error('meal') is-invalid @enderror"  value="{{ old('meal', $rooms->meal ?? '') }}">
                                                        @error('meal')
                                                            <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                        @enderror 
                                                </div>

                                                <div class="mb-3">
                                                    <label for="simpleinput" name="phone" class="form-label">Telefone</label>
                                                    <input type="text" id="title" name="phone" class="form-control  @error('phone') is-invalid @enderror"  value="{{ old('phone', $rooms->phone ?? '') }}">
                                                        @error('phone')
                                                            <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                        @enderror 
                                                </div>
                                               
                                            <div col-lg-12>
                                                

                                                
                                                <div class="mb-3">
                                                    <label for="text" class="form-label">Preço</label>
                                                    <input type="text" id="example-email" name="price" class="form-control  @error('price') is-invalid @enderror" placeholder="" value="{{ old('price', $rooms->price ?? '') }}">
                                                </div>
                                                @error('price')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                @enderror
                                                


                                            </div>
                                                
                                            </div>

                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label for="simpleinput" name="name" class="form-label">Nome do Quarto</label>
                                                    <input type="text" id="title" name="name" class="form-control"  value="{{ old('name', $rooms->name ?? '') }}">
                                                         
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="example-select" name="categorie_id" class="form-label">Categoria</label>
                                                    <select class="form-select @error('categorie_id') is-invalid @enderror "  name="categorie_id" id="example-select">
                                                         <option value="">--Select--</option>
                                                        @foreach ($categories as $item)
                                                        <option value={{ $item->id }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('categorie_id')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                

                                                <div class="mb-3">
                                                    <label for="simpleinput" name="bed" class="form-label">Número de Cama</label>
                                                    <input type="number" id="title" name="bed" class="form-control  @error('bed') is-invalid @enderror"  value="{{ old('bed', $rooms->bed ?? '') }}">
                                                        @error('bed')
                                                            <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                        @enderror 
                                                </div>

                                                <div class="mb-3">
                                                    <label for="example-select" name="status" class="form-label">Estado</label>
                                                    <select class="form-select @error('status') is-invalid @enderror"  name="status" id="example-select">
                                                        <option value="">Selecione</option>
                                                        <option value="Disponivel" value="Disponivel" {{ isset($rooms->status) && $rooms->status == 'Disponivel' ? 'selected' : old('status') }}>Disponivel</option>
                                                        <option value="Ocupado"{{ isset($rooms->status) && $rooms->status == 'Ocupado' ? 'selected' : old('status') }} >Ocupado</option>
                                                        <option value="Manutencao" {{ isset($rooms->status) && $rooms->status == 'Manutencao' ? 'selected' : old('status') }}>Manutencao</option>
                                                    </select>
                                                   @error('status')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                
                                               <div class="mb-3">
                                                    <label for="example-textarea" name="description" class="form-label">Descricao</label>
                                                    <textarea class="form-control" name="description" value="{{ old('description', $rooms->description ?? '') }}" id="example-textarea"></textarea>
                                               
                                                   

                                                </div>
                                                
                                                
                                            </div>
                                        @if(isset($rooms))
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Atualizar</button>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Adicionar</button>
                                            </div>
                                        @endif
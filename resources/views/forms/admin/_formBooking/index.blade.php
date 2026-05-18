<div class="row">
                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label for="nome_cliente_search" class="form-label">Nome do Cliente</label>
    
                                        <!-- Input visível do tipo SEARCH -->
                                                <input type="search" 
                                                    id="nome_cliente_search" 
                                                    class="form-control @error('customer_id') is-invalid @enderror" 
                                                    placeholder="Digite o nome do cliente..." 
                                                    autocomplete="off" value="{{ old('customer_id', $bookings->customer->name ?? '') }}"> 
                                                    @error('customer_id')
                                                    <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                @enderror 
                                                    
                                                <!-- Input oculto que vai guardar o ID real -->
                                                <input type="hidden" name="customer_id" id="customer_id">
                                                
                                                <!-- Div para exibir os resultados da busca -->
                                                    <div id="customer_list" class="list-group" style="position:absolute; z-index:1050;"></div>
                                                </div>
                                    

                                                <div class="mb-3">
                                                    <label for="example-date" class="form-label">Data de Entrada</label>
                                                    <input class="form-control @error('checkin') is-invalid @enderror" id="example-date" type="date"
                                                        name="checkin" value="{{ old('checkin', $bookings->checkin ?? '') }}">
                                                </div>
                                                @error('checkin')
                                                    <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                @enderror 
                                                
                                                <div class="mb-3">
                                                    <label for="example-select" name="status" class="form-label">Estado</label>
                                                    <select class="form-select @error('status') is-invalid @enderror"  name="status" id="example-select">
                                                        <option value="">Selecione</option>
                                                        
                                                        <option value="Pendente" {{ (old('status', $bookings->status ?? '') == 'Pendente') ? 'selected' : '' }}>Pendente</option>
                                                       
                                                    </select>
                                                    @error('status')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror 
                                                </div>

                                            </div>

                                            <div class="col-lg-6">
                                                
                                                <div class="mb-3">
                                                    <label for="example-select" name="room_id" class="form-label">Quarto</label>
                                                    <select class="form-select @error('room_id') is-invalid @enderror"  name="room_id" id="example-select">
                                                         <option value="">--Select--</option>
                                                        @foreach ($rooms as $item)
                                                        <option value="{{ $item->id }}" {{ old('room_id', $bookings->room_id ?? '') == $item->id ? 'selected' : '' }} >{{ $item->number }}</option>
                                                        @endforeach 
                                                    </select>
                                                    @error('room_id')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="example-date" class="form-label">Data de Saída</label>
                                                    <input class="form-control @error('checkout') is-invalid @enderror" id="example-date" type="date"
                                                        name="checkout" value="{{ old('checkout', $bookings->checkout ?? '') }}">
                                                </div>
                                                @error('checkout')
                                                    <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                @enderror

                                                
                                                
                                            </div>
                                          
                                                


                                        @if(isset($bookings))
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Atualizar</button>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Adicionar</button>
                                            </div>
                                        @endif
                                      
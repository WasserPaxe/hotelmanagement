<div class="row">
                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label for="example-select" name="customer_id" class="form-label">Nome Cliente</label>
                                                    <select class="form-select @error('customer_id') is-invalid @enderror"  name="customer_id" id="example-select">
                                                         <option value="">--Select--</option>
                                                        @foreach ($customers as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach 
                                                    </select>
                                                   @error('customer_id')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror 
                                                </div>

                                                <div class="mb-3">
                                                    <label for="example-select" name="customer_id" class="form-label">Email</label>
                                                    <select class="form-select @error('customer_id') is-invalid @enderror"  name="customer_id" id="example-select">
                                                         <option value="">--Select--</option>
                                                        @foreach ($customers as $item)
                                                        <option value={{ $item->id }}>{{ $item->email }}</option>
                                                        @endforeach 
                                                    </select>
                                                   @error('customer_id')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror 
                                                </div>

                                                

                                                <div class="mb-3">
                                                    <label for="example-select" name="room_id" class="form-label">Categoria</label>
                                                    <select class="form-select @error('room_id') is-invalid @enderror"  name="room_id" id="example-select">
                                                         <option value="">--Select--</option>
                                                        @foreach ($rooms as $item)
                                                        <option value={{ $item->id }}>{{ $item->categorie->name }}</option>
                                                        @endforeach
                                                    </select>
                                                   @error('room_id')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-date" class="form-label">Check IN</label>
                                                    <input class="form-control @error('checkin') is-invalid @enderror" id="example-date" type="date"
                                                        name="checkin">
                                                </div>
                                                @error('checkin')
                                                    <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                @enderror 
                           

                                            </div>

                                            <div class="col-lg-6">
                                                
                                                <div class="mb-3">
                                                    <label for="example-select" name="customer_id" class="form-label">Telemovel</label>
                                                    <select class="form-select @error('customer_id') is-invalid @enderror "  name="customer_id" id="example-select">
                                                         <option value="">--Select--</option>
                                                        @foreach ($customers as $item)
                                                        <option value="{{ $item->id }}">{{ $item->phone }}</option>
                                                        @endforeach 
                                                    </select>
                                                   @error('customer_id')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror 
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-select" name="room_id" class="form-label">Quarto</label>
                                                    <select class="form-select @error('room_id') is-invalid @enderror"  name="room_id" id="example-select">
                                                         <option value="">--Select--</option>
                                                        @foreach ($rooms as $item)
                                                        <option value={{ $item->id }}>{{ $item->number }}</option>
                                                        @endforeach 
                                                    </select>
                                                    @error('room_id')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="example-date" class="form-label">Check Out</label>
                                                    <input class="form-control @error('checkout') is-invalid @enderror" id="example-date" type="date"
                                                        name="checkout">
                                                </div>
                                                @error('checkout')
                                                    <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                @enderror

                                                <div class="mb-3">
                                                    <label for="example-select" name="status" class="form-label">Estado</label>
                                                    <select class="form-select @error('status') is-invalid @enderror"  name="status" id="example-select">
                                                        <option value="">Selecione</option>
                                                        <option value="Disponivel" value="Confirmado" {{ isset($bookings->status) && $bookings->status == 'Confirmado' ? 'selected' : old('status') }}>Confirmado</option>
                                                        <option value="Pendente"{{ isset($bookings->status) && $bookings->status == 'Pendente' ? 'selected' : old('status') }}>Pendente</option>
                                                       
                                                    </select>
                                                    @error('status')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror 
                                                </div>
                                                
                                               
                                                
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="example-textarea" name="description" class="form-label">Descricao</label>
                                                    <textarea class="form-control" name="description" id="example-textarea" rows="5" ></textarea>
                                                </div>
                                            <div>

                                        @if(isset($bookings))
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Atualizar</button>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Adicionar</button>
                                            </div>
                                        @endif
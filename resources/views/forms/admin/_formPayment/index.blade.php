<div class="row">
                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label for="example-select" name="booking_id" class="form-label">Reserva Nº</label>
                                                    <select class="form-select @error('booking_id') is-invalid @enderror "  name="booking_id" id="example-select">
                                                         <option value="">--Select--</option>
                                                        @foreach ($bookings as $item)
                                                        <option value="{{ $item->id }}" {{-- {{ ('booking_id', $payments->booking_id) == $item->id ? 'selected' : '' }} --}}>{{ $item->id }} NBK</option>
                                                        @endforeach
                                                    </select>
                                                    @error('booking_id')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                            
                                               <div class="mb-3">
                                                    <label for="example-select" name="method" class="form-label">Metodo de Pagamento</label>
                                                    <select class="form-select @error('method') is-invalid @enderror"  name="method" id="example-select">
                                                        <option value="">Selecione</option>
                                                        <option value="Dinheiro"  {{ isset($payments->method) && $payments->method == 'Dinheiro' ? 'selected' : old('method') }}>Dinheiro</option>
                                                        <option value="Cartao"{{ isset($payments->method) && $payments->method == 'Cartao' ? 'selected' : old('method') }} >Cartao</option>
                                                        
                                                    </select>
                                                   @error('method')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="example-select" name="status" class="form-label">Estado</label>
                                                    <select class="form-select @error('status') is-invalid @enderror"  name="status" id="example-select">
                                                        <option value="">Selecione</option>
                                                        <option value="Confirmado" {{ isset($payments->status) && $payments->status == 'Confirmado' ? 'selected' : old('status') }}>Confirmado</option>
                                                        <option value="Pendente"{{ isset($payments->status) && $payments->status == 'Pendente' ? 'selected' : old('status') }} >Pendente</option>
                                                        
                                                    </select>
                                                   @error('status')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>

                

                                            </div>

                                            <div class="col-lg-6">

                                               <div class="mb-3">
                                                    <label for="example-select" name="totalPrice" class="form-label">Valor Total</label>
                                                    <select class="form-select @error('totalPrice') is-invalid @enderror "  name="totalPrice" id="example-select">
                                                         <option value="">--Select--</option>
                                                        @foreach ($bookings as $item)
                                                        <option value="{{ $item->id }}"{{--  {{ old('totalPrice', $payments->totalPrice) == $item->id ? 'selected' : '' }} --}}>{{ $item->room->price }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('totalPrice')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="example-date" class="form-label">Data de Pagamento</label>
                                                    <input class="form-control @error('paymentDate') is-invalid @enderror" id="example-date" type="date" name="paymentDate" value="{{ old('paymentDate', $payments->paymentDate ?? '') }}">
                                                </div>
                                                @error('paymentDate')
                                                    <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                @enderror
                                                
                                                <div class="mb-3">
                                                    <label for="example-select" name="currency" class="form-label">Moeda</label>
                                                    <select class="form-select @error('currency') is-invalid @enderror"  name="currency" id="example-select">
                                                        <option value="">Selecione</option>
                                                        <option value="Kwanza" {{ isset($payments->currency) && $payments->currency == 'Kwanza' ? 'selected' : old('currency') }}>Kwanza</option>
                                                        <option value="Euro"{{ isset($payments->currency) && $payments->currency == 'Euro' ? 'selected' : old('currency') }} >Euro</option>
                                                        <option value="Dolár"{{ isset($payments->currency) && $payments->currency == 'Dolár' ? 'selected' : old('currency') }} >Dolár</option>
                                                        
                                                    </select>
                                                   @error('currency')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                
                                                
                                                
                                               
                                                
                                                
                                            </div>
                                        @if(isset($payments))
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Atualizar</button>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Adicionar</button>
                                            </div>
                                        @endif
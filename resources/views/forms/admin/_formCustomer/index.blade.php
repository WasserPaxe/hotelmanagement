<div class="row">
                                            <div class="col-lg-6">
                                                
                                                <div class="mb-3">
                                                    <label for="simpleinput" name="name" class="form-label">Nome</label>
                                                    <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', $customers->name ?? '') }}">
                                                        @error('name')
                                                            <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                        @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="simpleinput" name="phone" class="form-label">Telemovel</label>
                                                    <input type="text" id="simpleinput" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $customers->phone ?? '') }}">

                                                    @error('phone')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            
                                               <div class="mb-3">
                                                    <label for="simpleinput" name="docnumber" class="form-label">Nº Bilhete de Identidade/Passaporte</label>
                                                    <input type="text" id="simpleinput" name="docnumber" class="form-control @error('docnumber') is-invalid @enderror" value="{{ old('docnumber', $customers->docnumber ?? '') }}">
                                                    @error('phone')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>

                

                                            </div>

                                            <div class="col-lg-6">
                                                
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" id="example-email" name="email" class="form-control" placeholder="Email" value="{{ old('email', $customers->email ?? '') }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-select" name="nationality" class="form-label">Nacionalidade</label>
                                                    <select class="form-select"  name="nationality" id="example-select">
                                                        <option value="">Selecione</option>
                                                        <option>Angolana</option>
                                                        <option>Brasileira</option>
                                                        <option>Portuguesa</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="example-select" name="gender" class="form-label">Genero</label>
                                                    <select class="form-select @error('gender') is-invalid @enderror"  name="gender" id="example-select">
                                                        <option value="">Selecione</option>
                                                        <option value="Masculino" {{ isset($customers->gender) && $customers->gender == 'Masculino' ? 'selected' : old('gender') }}>Masculino</option>
                                                        <option value="Feminino" {{ isset($customers->gender) && $customers->gender == 'Feminino' ? 'selected' : old('gender') }}>Feminino</option>
                                                    </select>
                                                    @error('gender')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                
                                                
                                            </div>
                                        @if(isset($customers))
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Atualizar</button>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Adicionar</button>
                                            </div>
                                        @endif

                                        
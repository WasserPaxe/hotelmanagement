<div class="row">
                                            <div class="col-lg-6">
                                                
                                                <div class="mb-3">
                                                    <label for="simpleinput" name="name" class="form-label">Nome</label>
                                                    <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', $employees->name ?? '') }}">
                                                        @error('name')
                                                            <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                        @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="simpleinput" name="phone" class="form-label">Telemovel</label>
                                                    <input type="text" id="simpleinput" name="phone" class="form-control" value="{{ old('phone', $employees->phone ?? '') }}">

                                                </div>
                                            
                                               <div class="mb-3">
                                                    <label for="simpleinput" name="department" class="form-label">Departamento</label>
                                                    <input type="text" id="simpleinput" name="department" class="form-control @error('department') is-invalid @enderror" value="{{ old('department', $employees->department ?? '') }}">
                                                    @error('department')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="example-date" class="form-label">Data de Admissão</label>
                                                    <input class="form-control @error('admission') is-invalid @enderror" id="example-date" type="date" name="admission" value="{{ old('admission', $employees->admission ?? '') }}">
                                                </div>
                                                @error('admission')
                                                    <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                @enderror

                

                                            </div>

                                            <div class="col-lg-6">
                                                
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" id="example-email" name="email" class="form-control" placeholder="Email" value="{{ old('email', $employees->email ?? '') }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="simpleinput" name="identification" class="form-label">Identificação</label>
                                                    <input type="text" id="simpleinput" name="identification" class="form-control @error('identification') is-invalid @enderror" value="{{ old('identification', $employees->identification ?? '') }}">
                                                    @error('identification')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="role" class="form-label">Função</label>
                                                    <input type="text"  name="role" class="form-control @error('role') is-invalid @enderror" placeholder="" value="{{ old('role', $employees->role ?? '') }}">
                                                     @error('role')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-select" name="status" class="form-label">Estado</label>
                                                    <select class="form-select @error('status') is-invalid @enderror"  name="status" id="example-select">
                                                        <option value="">Selecione</option>
                                                        <option>Activo</option>
                                                        <option>Desativo</option>
                                                    </select>
                                                    @error('status')
                                                        <div class="position-absolute text-danger small" style="z-index:5;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                
                                                
                                                
                                                
                                            </div>
                                        @if(isset($employees))
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Atualizar</button>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <button  class="btn btn-primary m-2">Adicionar</button>
                                            </div>
                                        @endif

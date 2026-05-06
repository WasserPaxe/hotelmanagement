<div class="row">
                                            <div class="col-lg-6">
                                                
                                                <div class="mb-3">
                                                    <label for="simpleinput" name="name" class="form-label">Nome</label>
                                                    <input type="text" id="title" name="name" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="simpleinput" name="phone" class="form-label">Telemovel</label>
                                                    <input type="text" id="simpleinput" name="phone" class="form-control" value="">
                                                </div>
                                            
                                               <div class="mb-3">
                                                    <label for="simpleinput" name="docnumber" class="form-label">Nº Bilhete de Identidade/Passaporte</label>
                                                    <input type="text" id="simpleinput" name="docnumber" class="form-control">
                                                </div>

                                                

                                            </div>

                                            <div class="col-lg-6">
                                                
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" id="example-email" name="email" class="form-control" placeholder="Email">
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
                                                    <select class="form-select"  name="gender" id="example-select">
                                                        <option value="">Selecione</option>
                                                        <option>Masculino</option>
                                                        <option>Feminino</option>
                                                    </select>
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

                                        
<ol class="breadcrumb">
        <li class="breadcrumb-item ">
          <a href="?controller=Main" class="text-seccess">Back Office</a>
        </li>
        <li class="breadcrumb-item active">Edición Perfil</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-user-circle-o"></i> Edición Perfil<a class="btn btn-warning float-right" href="?controller=Usuarios&action=showPass">Cambiar Contraseña</a></div>
        <div class="card-body">
            <form id="loginForm" action="?controller=Usuarios&action=update" method="POST"  class="form-horizontal" >
                    <div class="form-row">
                        <div class="col-md-6">
                             <div class="form-group">
                                <label for="exampleInputName">*Nombre completo</label>
                                <input value="<?php echo $user->id ?>" type="hidden" name="id" >
                                <input value="<?php echo Session::get('level') ?>" type="hidden" name="rol" >
                                <input value="<?php echo $user->name ?>" class="form-control" id="exampleInputName" type="text" name="nombre" aria-describedby="nombre" placeholder="Nombre completo">
                             </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label for="exampleInputEmail1">*Email address</label>
                                <input value="<?php echo $user->email ?>" class="form-control" id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Correo electrónico">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputName">*Tipo de documento</label>
                                <select  class="form-control" name="tipoDocumento" id="exampleFormControlSelect1">
                                    <option><?php echo $user->tipoDocumento ?></option>
                                    <option>CI</option>
                                    <option>CE</option>
                                    <option>Pasaporte</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Documento de indentidad</label>
                                <input value="<?php echo $user->cc ?>" class="form-control" id="exampleInputEmail1" type="text" name="cc" aria-describedby="emailHelp" placeholder="Documento de identidad">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputName">Fecha de nacimiento</label>
                                <div class="input-group date fj-date">
                                    <input value="<?php echo $user->nacimiento ?>" type="text" name="nacimiento" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
               
                        <div class="form-row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="exampleInputName">Teléfono</label>
                                  <input value="<?php echo $user->telefono ?>" class="form-control" id="exampleInputName" type="text" name="telefono" aria-describedby="nombre" placeholder="Número de teléfono">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Celular</label>
                                  <input value="<?php echo $user->celular ?>" class="form-control" id="exampleInputEmail1" type="text" name="celular" aria-describedby="emailHelp" placeholder="Número de celular">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Dirección</label>
                                  <input value="<?php echo $user->direccion ?>" class="form-control" id="exampleInputEmail1" type="text" name="direccion" aria-describedby="emailHelp" placeholder="Dirección">
                              </div>
                          </div>
                        </div>
               
              
                  <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName">Ciudad</label>
                            <input value="<?php echo $user->ciudad ?>" class="form-control" id="exampleInputName" type="text" name="ciudad" aria-describedby="nombre" placeholder="Ciudad">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Provincia</label>
                            <input value="<?php echo $user->provincia ?>" class="form-control" id="exampleInputEmail1" type="text" name="provincia" aria-describedby="emailHelp" placeholder="Provincia">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">País</label>
                            <input value="<?php echo $user->pais ?>" class="form-control" id="exampleInputEmail1" type="text" name="pais" aria-describedby="emailHelp" placeholder="País">
                        </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary float-right cursor-pointer" >Guardar</button>
                <a href="javascript:history.back(1)" class="btn btn-success float-right cursor-pointer mr-2" >Regresar</a>
            </form>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>

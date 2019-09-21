
@extends('layout.layout')

@section('contenido')
    {{ $mensaje=1;  }}
    <div class="content-wrapper">
      <section class="content-header">
        <h1>Tipo Fomulario de Trabajo</h1>
        <ol class="breadcrumb">
          <li class="active">Todas las categorias</li>
        </ol>
      </section>
      <section class="content">
        <div class="row">     
          <div class="col-md-12">
          <?php if($mensaje==1){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mensaje</h4>
                  Agregado correctamente.
              </div>
            <?php }  ?>
            <?php if($mensaje==-1){ ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Mensaje</h4>
                  Error, intente nuevamente.
            </div>
            <?php } ?>
            <?php if($mensaje==-2){ ?>
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Mensaje</h4>
                  Error, intente nuevamente.
              </div>
            <?php } ?>
            <?php if($mensaje==2){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mensaje</h4>
                  Actualizado correctamente.
              </div>
            <?php }  ?>         
          </div>   
          <div class="col-md-6">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Formularios <?php echo $categoria->getNombre_tipo_labor() ?></h3>
              </div>
              <div class="col-md-12 text-center">
                <!-- volver -->
                <a href="/perfil-labores.php" class="btn btn-danger pull-left">Volver</a>
                <!--  formulario -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-dangerCategoria"><i class="fa fa-check-square"></i>&nbsp;Nuevo Requisito</button>
                <form action="Controlador/Cadmin-labores-formulario.php" method="post">
                  <div class="modal modal-success fade" id="modal-dangerCategoria" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Crear Requisito</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <p>One fine body…</p> -->
                          <div class="container-fluid">
                            <div class="row">
                              <div class="form-group md-form md-5">
                                <label for="inputc1" class="col-md-4 control-label">Nombre Requisito</label>
                                <div class="col-md-6">
                                  <input type="text" class="form-control" id="inputc1" name="txtNuevoRequisito" value="" placeholder="Nombre min 5 max 60" title="Requiere 5 a 60 caracteres" maxlength="60" pattern=".{5,60}" required>
                                </div>               
                              </div>                                
                            </div>
                          </div>                       
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                          <button type="submit" name="opcLabor" value="addRequisito-0" class="btn btn-outline">Agregar</button>
                        </div>
                      </div>
                    </div>
                  </div>                
                </form>                
                <br>
              </div>
              <div class="box-body table-responsive">
                <form action="Controlador/Cadmin-labores-formulario.php" method="post">
                  <table  class="datatable table table-striped " cellspacing="0"  width="100%">
                    <thead>
                      <tr>
                        <th><strong>#</strong></th>
                        <th>Nombre</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i = 0;
                        foreach ($labores as $c){
                        $i+=1;  
                        ?>                      
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $c->getNombre_labor()?></td>                       
                        <td>
                          <?php if($c->getActivo()==0){ ?>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $c->getId_labores()?>"><i class="fa fa-ban"></i>&nbsp;Desactivado</button>
                            <div class="modal modal-success fade" id="modal-danger<?php echo $c->getId_labores()?>" style="display: none;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Desea Activar a <?php echo $c->getNombre_labor() ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <!-- <p>One fine body…</p> -->
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" name="opcLabor" value="activarRequisito-<?php echo $c->getId_labores() ?>" class="btn btn-outline">Activar</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                          <?php } ?>
                          <?php if($c->getActivo()==1){ ?>
                            <!-- Editar -->
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-dangerEditar<?php echo $c->getId_labores()?>"><i class="fa fa-edit"></i></button>
                            <div class="modal modal-warning fade" id="modal-dangerEditar<?php echo $c->getId_labores()?>" style="display: none;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Desea editar <?php echo $c->getNombre_labor() ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="container-fluid">
                                      <div class="row">
                                        <div class="form-group md-form md-5">
                                          <label for="inputc1" class="col-md-4 control-label">Nombre Requisito</label>
                                          <div class="col-md-6">
                                            <input type="text" class="form-control" id="inputc1" name="txtUpdateLabor<?php echo $c->getId_labores() ?>" value="<?php echo $c->getNombre_labor() ?>" placeholder="Categoría min 5 max 60" title="Requiere 5 a 60 caracteres" maxlength="60" pattern=".{5,60}" required>
                                          </div>               
                                        </div>                                
                                      </div>
                                    </div> 
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" name="opcLabor" value="actualizarRequisito-<?php echo $c->getId_labores() ?>" class="btn btn-outline">Actualizar</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- Activar -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-danger<?php echo $c->getId_labores()?>"><i class="fa fa-check"></i>&nbsp;Activado</button>
                            <div class="modal modal-danger fade" id="modal-danger<?php echo $c->getId_labores()?>" style="display: none;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Desea Desactivar a <?php echo $c->getNombre_labor() ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <!-- <p>One fine body…</p> -->
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" name="opcLabor" value="desactivarRequisito-<?php echo $c->getId_labores() ?>" class="btn btn-outline">Desactivar</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                          <?php } ?>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- /.content-wrapper -->

@stop

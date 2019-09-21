<?php 
    session_start();
    if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
    
    require_once ($rootDir . "/DAO/AccesoDAO.php");
    require_once ($rootDir . "/DAO/ClienteDAO.php");    
    require_once ($rootDir . "/DAO/Tipo_laborDAO.php");
    require_once ($rootDir . "/DAO/LaboresDAO.php");

    if(isset($_SESSION['id_acceso_key'])){
      $id_acceso = $_SESSION['id_acceso_key'];
      $acceso = AccesoDAO::buscar($id_acceso);

      if($acceso->getId_tipo_usuario()==0){ //solo Administrador
        $estado = 0;
        $nombre = $acceso->nombreCompleto();

        // $labores = LaboresDAO::buscarAll();
        $categorias = Tipo_laborDAO::buscarAll();
        $_SESSION['id_categoria']=null;
        $mensaje=0;
        if(isset($_SESSION['mensaje_nuevo_labores'])){
          $mensaje = $_SESSION['mensaje_nuevo_labores'];
          $_SESSION['mensaje_nuevo_labores']=null;
        }


      }else{
        $_SESSION['mensaje']="No permitido";
        header('Location: index.php');
      }
    }else{
      $_SESSION['mensaje']="No permitido";
      header('Location: index.php');
    }
  ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ChileServices</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/ico" href="favicon.ico">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Datatables -->
  <link href="bower_components/dataTables/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<!--  sidebar-collapse -->

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php require_once('nav.php'); ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>Tipos Fomularios de Trabajos</h1>
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
            <div class="box box-success">
              <div class="box-header">
                <h3 class="box-title">Tipo Formularios</h3>
              </div>
              <div class="col-md-12 text-center">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-dangerCategoria"><i class="fa fa-briefcase"></i>&nbsp;Nueva Categoría</button>
                <form action="Controlador/Cadmin-labores.php" method="post">
                  <div class="modal modal-success fade" id="modal-dangerCategoria" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Crear Nueva Categoría</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <p>One fine body…</p> -->
                          <div class="container-fluid">
                            <div class="row">
                              <div class="form-group md-form md-5">
                                <label for="inputc1" class="col-md-4 control-label">Nombre Categoría</label>
                                <div class="col-md-6">
                                  <input type="text" class="form-control" id="inputc1" name="txtNuevaCategoria" value="" placeholder="Categoría min 5 max 60" title="Requiere 5 a 60 caracteres" maxlength="60" pattern=".{5,60}" required>
                                </div>               
                              </div>                                
                            </div>
                          </div>                       
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                          <button type="submit" name="opcLabor" value="addCategoria-0" class="btn btn-outline">Agregar</button>
                        </div>
                      </div>
                    </div>
                  </div>                
                </form>                
                <br>
              </div>
              <div class="box-body table-responsive">
                <form action="Controlador/Cadmin-labores.php" method="post">
                  <table class="datatable table table-striped table-bordered" cellspacing="0"  width="100%">
                    <thead>
                      <tr>
                        <th><strong>#</strong></th>
                        <th>Nombre</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=0;
                            foreach ($categorias as $c){ 
                            $i+=1;?>                      
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $c->getNombre_tipo_labor()?></td>                       
                        <td>
                          <?php if($c->getActivo()==1){ ?>
                            <button type="submit" class="btn btn-info btn-sm" name="opcLabor" value="verCategoria-<?php echo $c->getId_tipo_labor() ?>" ><i class="fa fa-eye"></i>&nbsp;Ver</button>
                          <?php } ?>
                        </td>
                        <td>
                          <?php if($c->getActivo()==0){ ?>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $c->getId_tipo_labor()?>"><i class="fa fa-ban"></i>&nbsp;Desactivado</button>
                            <div class="modal modal-success fade" id="modal-danger<?php echo $c->getId_tipo_labor()?>" style="display: none;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Desea Activar a <?php echo $c->getNombre_tipo_labor() ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <!-- <p>One fine body…</p> -->
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" name="opcLabor" value="activarCategoria-<?php echo $c->getId_tipo_labor() ?>" class="btn btn-outline">Activar</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                          <?php } ?>
                          <?php if($c->getActivo()==1){ ?>
                            <!-- Editar -->
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-dangerEditar<?php echo $c->getId_tipo_labor()?>"><i class="fa fa-edit"></i></button>
                            <div class="modal modal-warning fade" id="modal-dangerEditar<?php echo $c->getId_tipo_labor()?>" style="display: none;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Desea editar <?php echo $c->getNombre_tipo_labor() ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="container-fluid">
                                      <div class="row">
                                        <div class="form-group md-form md-5">
                                          <label for="inputc1" class="col-md-4 control-label">Nombre Categoría</label>
                                          <div class="col-md-6">
                                            <input type="text" class="form-control" id="inputc1" name="txtUpdateCategoria<?php echo $c->getId_tipo_labor() ?>" value="<?php echo $c->getNombre_tipo_labor() ?>" placeholder="Categoría min 5 max 60" title="Requiere 5 a 60 caracteres" maxlength="60" pattern=".{5,60}" required>
                                          </div>               
                                        </div>                                
                                      </div>
                                    </div> 
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" name="opcLabor" value="actualizar-<?php echo $c->getId_tipo_labor() ?>" class="btn btn-outline">Actualizar</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- Activar -->
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-danger<?php echo $c->getId_tipo_labor()?>"><i class="fa fa-check"></i>&nbsp;Activado</button>
                            <div class="modal modal-danger fade" id="modal-danger<?php echo $c->getId_tipo_labor()?>" style="display: none;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Desea Desactivar a <?php echo $c->getNombre_tipo_labor() ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <!-- <p>One fine body…</p> -->
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" name="opcLabor" value="desactivarCategoria-<?php echo $c->getId_tipo_labor() ?>" class="btn btn-outline">Desactivar</button>
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
    <?php require_once('footer.php'); ?>
  </div>
  <script src="dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="bower_components/dataTables/js/jquery.dataTables.js"></script>
  <script src="bower_components/dataTables/js/script.js"></script>
</body>

</html>
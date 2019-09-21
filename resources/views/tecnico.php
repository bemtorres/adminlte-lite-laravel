<?php 
    session_start();
    if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];  

    require_once ($rootDir . "/DAO/TecnicoDAO.php");
    require_once ($rootDir . "/DAO/AccesoDAO.php");

    
    if(isset($_SESSION['id_acceso_key'])){
      $id_acceso = $_SESSION['id_acceso_key'];
      $acceso = AccesoDAO::buscar($id_acceso);
      if($acceso->getId_tipo_usuario()==0){ //solo Administrador
        $estado = 0;
        $nombre = $acceso->nombreCompleto();


        // Programa
        $tecnicos = TecnicoDAO::buscarAll();
        $mensaje=0;
        if(isset($_SESSION['mensaje_nuevo_tecnico'])){
          $mensaje = $_SESSION['mensaje_nuevo_tecnico'];
          $_SESSION['mensaje_nuevo_tecnico']=null;
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
        <h1>
          Técnicos
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Todos los Técnicos</li>
        </ol>
      </section>
      <section class="content">
        <div class="row">    
          <div class="col-md-12">
            <?php if($mensaje==1){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mensaje</h4>
                  Tecnico agregado correctamente.
              </div>
            <?php }  ?>
          </div>    
          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Todos los Técnicos</h3>
              </div>
              <div class="col-md-12 text-center">
                <a href="nuevo-tecnico.php" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i> Nuevo Técnico</a>
           
              </div>
              <br>
              <br>
                <!-- /.box-header -->
              <div class="box-body table-responsive">
                <form action="Controlador/Cagregar-tecnico.php" method="post">
                <table id="tabla" class="datatable table table-striped " cellspacing="0"  width="100%">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      <th>Especialidad</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($tecnicos as $t){
                          $acTec = AccesoDAO::buscar($t->getId_acceso());
                      ?>
                    <tr>
                      <td><?php echo $acTec->nombreCompleto()?></td>
                      <td><?php echo $acTec->getTelefono()?></td>
                      <td><?php echo $acTec->getCorreo()?></td>
                      
                      <td><?php echo $t->getEspecialidad()?></td>
                     
                      <td>
                        <!-- <button type="submit" name="opcCliente" value="C<?php echo $t->getId_tecnico() ?>" class="btn btn-success"><i class="fa fa-list"></i> Detalle</button>                      -->
                        <button type="submit" name="buscarTecnico" value="buscar-<?php echo $t->getId_tecnico() ?>"  class="btn btn-info mb-3"><i class="fa fa-edit"></i></button>
                        <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $t->getId_tecnico()?>"><i class="fa fa-trash"></i></button>
                        <div class="modal modal-danger fade" id="modal-danger<?php echo $t->getId_tecnico()  ?>" style="display: none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Desea Bloquear a <?php echo $acTec->getNombres() ?></h4>
                              </div>
                              <div class="modal-body">
                                <p>One fine body…</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-outline">Bloquear</button>
                              </div>
                            </div>
                          </div>
                        </div> -->
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
  
  <script>
    $('#table').DataTable({ responsive: true });
    $('#table').attr('style', 'border-collapse: collapse !important');
  </script>
  <script src="bower_components/dataTables/js/script.js"></script>
</body>

</html>
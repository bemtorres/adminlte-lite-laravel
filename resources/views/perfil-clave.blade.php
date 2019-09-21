<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ChileServices</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/ico" href="/favicon.ico">
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<!--  sidebar-collapse -->

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

  <?php 
      if($acceso->getId_tipo_usuario()==0  ){
        require_once('nav.php'); 
      }
      if($acceso->getId_tipo_usuario()==1 ){
        require_once('tecnico_nav.php'); 
      }    
      if($acceso->getId_tipo_usuario()==2 ){
        require_once('cliente_nav.php'); 
      }
      ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Cambiar Contraseña
        </h1>
        <ol class="breadcrumb">
          <!-- <li><a href="/home.php"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="/tecnico.php"><i class="fa fa-user-plus"></i> Técnicos</a></li> -->
          <li class="active">Cambiar contraseña</li>
        </ol>
      </section>
      <section class="content">
        <div class="row">    
          <div class="col-md-12">
            <?php if($mensaje==1){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mensaje</h4>
                  Contraseña actualizada correctamente.
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
                  Las nuevas contraseñas no son iguales.
              </div>
            <?php } ?>
            <?php if($mensaje==-3){ ?>
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Mensaje</h4>
                  La contraseña actual no es la misma.
            </div>
            <?php } ?>       
            <?php if($mensaje==-4){ ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Mensaje</h4>
                  Error, intente nuevamente.
            </div>
            <?php } ?>
          </div>       
          <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Formulario Técnico</h3> -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="Controlador/Clogin.php">
              <div class="box-body">              
                <div class="form-group">
                  <label for="inputc" class="col-sm-4 control-label">Contraseña actual</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="inputc" autocomplete="off" name="txtPassActual"  placeholder="Contraseña actual" title="Requiere 4 a 9 caracteres" maxlength="9"  pattern=".{4,9}" required>
                  </div>               
                </div>              
                <div class="form-group">
                  <label for="inputc1" class="col-sm-4 control-label">Contraseña nueva</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="inputc1" autocomplete="off" name="txtPassNueva1" value="" placeholder="Contraseña nueva min 4 max 9" title="Requiere 5 a 9 caracteres" maxlength="9"  pattern=".{4,9}" required>
                  </div>               
                </div>   
                <div class="form-group">
                  <label for="inputc2" class="col-sm-4 control-label">Repetir contraseña</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="inputc2" autocomplete="off" name="txtPassNueva2" value="" placeholder="Contraseña nueva min 4 max 9" title="Requiere 5 a 9 caracteres" maxlength="9"  pattern=".{4,9}" required>
                  </div>               
                </div>   
     
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right" name="opcion" value="updatePass">Actualizar</button>
              </div>
              <!-- /.box-footer -->
            </form>
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
</body>
</html>
@extends('layout.layout')

@section('contenido')

  <section class="content-header">
    <h1>
      Buenos Dias Administrador
      <small> buenos dias </small>
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="/#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol> -->
  </section>
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
          <h3>1</h3>

            <p>Clientes</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>11</h3>

            <p>Personas</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <!-- <a href="/#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
    </div>

  </section>

  <br>
  <br>
  <br>
  <section class="content-header">
    <h1>
      Cambiar Contraseña
    </h1>
    <ol class="breadcrumb">
      <li class="active">Cambiar contraseña</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">         
      <div class="col-md-6">
      <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <!-- <h3 class="box-title">Formulario Técnico</h3> -->
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" method="post" action="">
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
              <div class="form-group">
                <label  class="col-sm-4 control-label">Select</label>
                <select class="form-control col-sm-6">
                  <option>option 1</option>
                  <option>option 2</option>
                  <option>option 3</option>
                  <option>option 4</option>
                  <option>option 5</option>
                </select>
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
@stop
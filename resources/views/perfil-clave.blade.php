
 
 
@extends('layout.layout')
@php    
    $mensaje=0; 
    $comunas =['Calera de tango', 'San Bernardo'];
@endphp
@section('contenido')
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
    

@extends('layout.layout')
@php    
    $mensaje=0; 
    $comunas =['Calera de tango', 'San Bernardo'];
@endphp
@section('contenido')

     
        <section class="content-header">
          <h1>
            Perfil
            <small>Administrador</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
          </ol>
        </section>
        <section class="content">
          <div class="row">    
            <div class="col-md-12">
              @if ($mensaje==1)
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Mensaje</h4>
                    Tecnico agregado correctamente.
                </div>
              @endif
              @if ($mensaje==-1)
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Mensaje</h4>
                    Error Agregar Tecnico, intente nuevamente.
                </div>
              @endif
              @if ($mensaje==-2)
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> Mensaje</h4>
                    Error algo paso.
                </div>
              @endif
              @if ($mensaje==-3)
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Mensaje</h4>
                      Correo ya en uso.
                </div>
              @endif
             
            </div>       
            <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title"></h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="">
                <div class="box-body">                 
                  <div class="form-group">
                    <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNombre" readonly name="txtNombreTecnico" value="Benjamin Torres"  placeholder="Nombre Técnico" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputCorreo" class="col-sm-2 control-label">Correo</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputCorreo" readonly name="txtCorreoTecnico" value="benja.mora.torres@gmail.com"  placeholder="Correo Electrónico" required>
                    </div>
                  </div>              
                  <div class="form-group">
                    <label for="inputTel" class="col-sm-2 control-label">Teléfono</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputTel" readonly name="txtTelefonoTecnico" value="123123123" placeholder="Telefono +5698999999" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputComuna" class="col-sm-2 control-label">Comuna</label>
                    <div class="col-sm-10">
                      <select class="js-example-basic-single form-control select2 " name="txtComuna" readonly required>
                        @foreach ($comunas as $c)
                            @if ($c=='San Bernardo')
                              <option selected value="{{ $c }}">{{ $c }}</option> 
                            @else
                              <option value="{{ $c }}">{{ $c }}</option>                     
                            @endif
                        @endforeach                      
                      </select>
                    </div>              
                  </div>
                  <div class="form-group">
                    <label for="inputDire" class="col-sm-2 control-label">Dirección</label>                 
                     <div class="col-sm-10">                      
                      <textarea class="form-control" id="comment" readonly name="txtDireccion" rows="5" maxlength="300"
                                placeholder="Calle, pasaje, número de casa o departamento..." required></textarea>
                                <div id="contador" class="text-danger"></div>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <a href="cambiarClave" class="btn btn-warning btn-lg pull-right btn-block">Cambiar Clave</a>

                </div>
              </form>
            </div>
          
          </div>
          </div>
        </section>
     
  
    
  @stop
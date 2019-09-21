
@extends('layout.layout')
@php    
    $mensaje=1; 
    // $usuarios =['Mario','Esteban','Benjamin','Elias','Marcos'];   
    $usuarios = [];
@endphp
@section('contenido')
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
            @if ($mensaje==1)
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mensaje</h4>
                  Agregado correctamente.
              </div>
            @endif
          </div>    
          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Todos los Usuarios</h3>
              </div>
              <div class="col-md-12 text-center">
                <a href="/newUsuario" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i> Nuevo Usuarios</a>
           
              </div>
              <br>
              <br>
                <!-- /.box-header -->
              <div class="box-body table-responsive">
                <form action="" method="post">
                  <table id="tabla" class="datatable table table-striped " cellspacing="0"  width="100%">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @if ( count($usuarios)>0 )                   
                        @foreach ($usuarios as $u)
                          <tr>
                            <td>{{ $u }}</td>
                            <td> <button type="submit" class="btn btn-sm btn-danger">Editar</button> </td>
                          </tr>
                        @endforeach
                      @endif         
                    </tbody>
                  </table>
                </form>                
              </div>
            </div>
          </div>
        </div>
      </section>
@stop
  
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>admin</title>
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
  <!-- Datatables -->
  <link href="/bower_components/dataTables/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">    
    @include('layout.nav')
    <div class="content-wrapper">
       @yield('contenido')
    </div>
    <!-- /.content-wrapper -->
    @include('layout.footer')
  </div>
  <script src="/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/dist/js/adminlte.min.js"></script>
  <script src="/bower_components/dataTables/js/jquery.dataTables.js"></script>  
  <script>
    $('#table').DataTable({ responsive: true });
    $('#table').attr('style', 'border-collapse: collapse !important');
  </script>
  <script src="/bower_components/dataTables/js/script.js"></script>
</body>

</html>
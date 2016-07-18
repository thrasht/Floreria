<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Florería</title>

    <!-- Kendo Files  -->

    <link rel="stylesheet" href="{{ asset('kendo/styles/kendo.common.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('kendo/styles/kendo.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('kendo/styles/kendo.dataviz.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('kendo/styles/kendo.dataviz.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('kendo/styles/kendo.default.mobile.min.css') }}" />


    <script src="{{ asset('kendo/js/jquery.min.js') }}"></script>
    <script src="{{ asset('kendo/js/jszip.min.js') }}"></script>
    <script src="{{ asset('kendo/js/kendo.all.min.js') }}"></script>

    <!-- Kendo Files  -->
    <!-- Mi CSS -->
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Florería</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="{{ route('pedidos') }}">Pedidos</a></li>
            <li><a href="{{ route('compras_proveedores') }}">Compras a proveedores </a></li>
            <li><a href="{{ route('admin') }}">Reports</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="{{ route('clientes') }}">Clientes</a></li>
            <li><a href="{{ route('proveedores') }}">Proveedores</a></li>
            <li><a href="{{ route('arreglos') }}">Arreglos</a></li>
            <li><a href="{{ route('flores') }}">Flores</a></li>
            <li><a href="{{ route('ocasiones') }}">Ocasiones</a></li>
            <li><a href="{{ route('estados_envio') }}">Estados para envios</a></li>
            <li><a href="{{ route('tipos_flores') }}">Tipos de flores</a></li>
            <li><a href="{{ route('contenedores') }}">Contenedores para flores</a></li>
            <li><a href="{{ route('direcciones_envio') }}">Direcciones de envío</a></li>
          </ul>
        </div>
      </div>
    </div>

    @yield('content')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="{{ asset('js/holder.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
   
  <script>
  $(function() {
    $( ".datepicker" ).datepicker( { dateFormat: 'yy-mm-dd' });
  });

  $('#verTabla').click(function (){
      $('#table2').slideToggle( "slow" );

    });
  </script>
  </body>
</html>

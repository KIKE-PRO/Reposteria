<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>@yield('title') - Empanadas To Go!</title>
    
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')  }}">
     <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')  }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" />
   <!-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="{{asset('css/menu.css')}}" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{asset('imagenes/logo.jpg')}}" width="200" height="80" class="d-inline-block align-top" alt="">
                
        </a>
        <a class="navbar-brand" href="{{ asset('/clientes') }}">
            <img src="{{ asset('imagenes/clientes.jpg') }}" width="80" height="80"  alt="">
            CLIENTES            
        </a>
        <a class="navbar-brand" href="{{ asset('/productos') }}">
            <img src="{{ asset('imagenes/productos.jpg') }}" width="80" height="80"  alt="">
            PRODUCTOS            
        </a>
         <a class="navbar-brand" href="{{ asset('ventas') }}">
            <img src="{{ asset('imagenes/ventas.jpg') }}" width="80" height="80"  alt="">
            VENTAS            
        </a>
         <a class="navbar-brand" href="#">
            <img src="{{ asset('imagenes/reportes.jpg') }}" width="80" height="80"  alt="">
            REPORTES            
        </a>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
             Logout
         </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </nav>
      </div>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
        <div class="row mt-5">
            <div class="col-12">
               @yield('content') 
            </div>
        </div>
        <div class="col-4">
            @section('sidebar') 
                <h2>Barra lateral</h2>
            @show
        </div>
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/bootstrap-select.min.js') }}"></script>
    @stack('scripts')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

  </body>
    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}"></script>
</html>
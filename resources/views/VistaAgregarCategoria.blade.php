@extends('adminlte::layouts.app')

@section('htmlheader_title')
    
@endsection


@section('main-content')
<div style="text-align: right;">
  
  <input type=image src="{{ asset('css/107831.png') }}" width="30" height="30" style="text-align: right;" onclick="location.href='{{ url('/VerCarrito/') }}'"> {{$cantidad}}

</div>

<div style="text-align: right;">
  
  <input type=image src="{{ asset('css/CERRRAR SESION.png') }}" width="80" height="25" style="text-align: right;" onclick="location.href='{{ url('/logout') }}'">

</div>
<div style="text-align: center;">
  <a href="{{ url('/') }}" >
                        <img src="{{ asset('css/descarga.jpg') }}" onclick="location.href='{{ url('/') }}'" style="width: 250px; height: 250px; text-align: center;text-align: center;" />
  </a>

</div>

<br>
<br>

<nav class="navbar navbar-default navbar-inverse "  style="background-color: rgba(230, 231,232) !important; border: rgba(230, 231,232) 0.5px solid;">



                <div class="container-fluid" style="border: rgba(230, 231,232) 0.5px solid;">
                    <div class="navbar-header" style="border: rgba(230, 231,232) 0.5px solid; text-align: center;">
 
                            <buttom class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="border: rgba(230, 231,232) 0.5px solid;">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>                               
                            </buttom>
                            
                                

                    </div>

                </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav">

                <!--
                <li class="dropdown messages-menu">
                    
                    <a href="{{ url('/PanelAdministracion') }}" >
                        Administrador
                    </a>
                    
                </li>-->

            <!--
              <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
              <li><a href="#">Link</a></li>-->
            
              <li class="dropdown">
                <a  href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: rgba(230, 231,232) !important; border: rgba(230, 231,232) 0.5px solid;color:#000000;font-size: 120%;" onclick="location.href='{{ url('/') }}'">INICIO</span></a>
              </li>
              <li  class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: rgba(230, 231,232) !important; border: rgba(230, 231,232) 0.5px solid;color:#000000;font-size: 120%;" onclick="location.href='{{ url('/VerHistoria') }}'">HISTORIA</span></a>
              </li>
              
              <!--
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: rgba(230, 231,232) !important; border: rgba(230, 231,232) 0.5px solid;color:#000000;font-size: 120%;">Vision</a>
              </li>-->

              @foreach ($categoria as $t )

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: rgba(230, 231,232) !important; border: rgba(230, 231,232) 0.5px solid; color:#000000;font-size: 120%;">{{$t->nombres}} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">

                    @foreach ($sub_categoria as $c )

                        @if($c->fid_categorias==$t->id)

                            <li><a href="#" onclick="location.href='{{ url('/VerProductos/'.$c->id.'/') }}'" style="color: color:#000000;font-size: 120%;">{{$c->nombres}}</a></li>


                        @endif
                     
                    @endforeach

                </ul>
              </li>

              @endforeach
              <li class="dropdown">
                <a  href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: rgba(230, 231,232) !important; border: rgba(230, 231,232) 0.5px solid;color:#000000;font-size: 120%;" onclick="location.href='{{ url('/VerContactos') }}'">CONTACTOS</span></a>
              </li>
            </ul>
            

            <form action="{{ url('/BuscarProductoBarraDeBusqueda') }}" method="post" class="form-inline my-2 my-lg-0" style="text-align: right;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="form-control mr-sm-2" type="search" name="busqueda" id="busqueda" placeholder="¿Que estas buscando?" aria-label="Search" style="width: 10%;text-align: center;">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                          </form>
                    </div>
                
            </nav>

            
<center><div class="container">

<div class="row">
     <div class="btn-group-vertical">
        
        <button type="button" class="btn" onclick="location.href='{{ url('/AgregarAdministracion/') }}'">Agregar Administrador</button>     

     </div>
      <div class="btn-group-vertical">
        
        <button type="button" class="btn" onclick="location.href='{{ url('/AgregarCategoria/') }}'">Agregar Categoria</button>

      </div>

    <div class="btn-group-vertical">
      
      <button type="button" class="btn" onclick="location.href='{{ url('/AgregarProducto/') }}'">Agregar Producto</button>

    </div>
    <div class="btn-group-vertical">
      
      <button type="button" class="btn" onclick="location.href='{{ url('/VerImportacionProductosMasivamente/') }}'">Importar Productos Masivamente</button>

    </div>

    <div class="btn-group-vertical">
      
      <button type="button" class="btn" onclick="location.href='{{ url('/VerEliminarAdministrador/') }}'">Eliminar Administrador</button>

    </div>

    <div class="btn-group-vertical">
      
      <button type="button" class="btn" onclick="location.href='{{ url('/ListarParaModificarAdministrador/') }}'">Modificar Administrador</button>

    </div>  

</div></center>

<br>

<center><div class="row">
   <div class="btn-group-vertical">
    
      <button type="button" class="btn" onclick="location.href='{{ url('/ListarProductos/') }}'">Opciones del Producto</button>

  </div>

</div></center>
<br>
<div class="login-logo">
  <b>AGREGAR CATEGORIA Y MENU</b>
</div>

<body class="hold-transition login-page">
  <div id="app">
        <div class="login-box">
<center><div class="row">
<div class="btn-group-vertical">
    <center><form action="{{ url('/GuardarCategoria') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <label style="color:#000000;font-size: 120%;">Nombre de la categoria</label>

                        <input type="text" class="form-control" placeholder="Categoria" name="categoria" required autofocus/>
                        
                        <br></br>
                        <label style="color:#000000;font-size: 120%;">Nombre del menu</label>
                        <input type="text" class="form-control" placeholder="Menu" name="subCatgoria" required autofocus/>

                    </div>
                        <div class="col-xs-4 col-xs-push-1" style="width: 85%;">
                            <button type="submit" class="btn" style="text-align: center;">Guardar</button>
                        </div>
                </form> </center>
    </div>
</div></center>
</div>
</div>
</body>

@endsection
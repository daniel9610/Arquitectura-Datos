

@extends('adminlte::layouts.app')

@section('htmlheader_title')

Vista Principal
  
@endsection


@section('main-content')

<div style="text-align: right;">
  
  <input type=image src="{{ asset('css/107831.png') }}" width="30" height="30" style="text-align: right;" onclick="location.href='{{ url('/VerCarrito/') }}'"> {{$cantidad}}

</div>

<div style="text-align: right;">
  
  <input type=image src="{{ asset('css/Mi cuenta.png') }}" width="80" height="30" style="text-align: right;" onclick="location.href='{{ url('/PanelAdministracion/') }}'">

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



<br>
<br>
<link rel="stylesheet" href="{{ asset('css/pielFooter.css') }}" />

	<div class="container">

    <center><h2>Contactos</h2></center>
          <br>
          <br>
          <div class="row row-30">
            <div class="col-md-4">
              
              <dl class="contact-list">
                <dt>Direccion:</dt>
                <dd>Cl. 80, Bogotá-Colombia</dd>
              </dl>
            </div>
            <div class="col-md-4">
                <dt>Correo:</dt>
                <dd>janzolahinc@uniminuto.edu.co</dd>
                
              </div>

              <div class="col-md-4 col-xl-3"style="width: 90%;">
              <dt style="text-align: center;">Redes Sociales</dt>
              <ul class="nav-list">
                <li><a href="https://www.facebook.com/CocinaTipicColombiana/">
                  <img alt="siguenos en facebook" height="20" src="https://3.bp.blogspot.com/-MQuocq7OzfU/UiXwUY81yQI/AAAAAAAAB0Q/h6-R_R2-buI/s1600/face.png" title="siguenos en facebook" width="20" />
                  ROTONDA DE COMIDA
                </a>
              </li>
                <li><a href="https://twitter.com/_mccolombia?lang=es"><img alt="siguenos en twitter" height="18" src="{{ asset('css/twitter2.png') }}" title="siguenos en twitter" width="20" /> ROTONDA DE COLOMBIA</a></li>
                
              </ul>
            </div>

            
          </div>
        </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
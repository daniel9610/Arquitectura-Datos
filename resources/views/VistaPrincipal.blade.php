@extends('adminlte::layouts.app')

@section('htmlheader_title')

Vista Principal
	
@endsection


@section('main-content')

<div style="text-align: right;">
  
  <input type=image src="{{ asset('css/107831.png') }}" width="30" height="30" style="text-align: right;" onclick="location.href='{{ url('/VerCarrito/') }}'"> {{$cantidad}}

</div>

<div style="text-align: right;">
  
  <input type=image src="{{ asset('css/Mi cuenta.png') }}" width="80" height="25" style="text-align: right;" onclick="location.href='{{ url('/PanelAdministracion/') }}'">

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

<div>
  
<img src="{{ asset('css/Foto Principal para pagina web.JPG') }}"  style="width: 100%; height: 100%; " />


</div>

<br>
<br>


 


<center>

<!--
  <div class="row" style="width: 100%;">
  <div class="col-md-12">

    <div id="mdb-lightbox-ui"></div>

    <div >

      <figure >
        <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(117).jpg" data-size="1600x1067">
          
            <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg"
            class="img-fluid" style="width: 300px; height: 250px; "/>
            <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg"
            class="img-fluid" style="width: 300px; height: 250px; "/>
            <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg"
            class="img-fluid" style="width: 300px; height: 250px; "/>
            <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg"
            class="img-fluid" style="width: 300px; height: 250px; "/>
            <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg"
            class="img-fluid" style="width: 300px; height: 250px; "/>
            
        </a>
      </figure>
      <figure >
        <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(117).jpg" data-size="1600x1067">
         
            <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg"
            class="img-fluid" style="width: 300px; height: 250px; "/>
            <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg"
            class="img-fluid" style="width: 300px; height: 250px; "/>
            <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg"
            class="img-fluid" style="width: 300px; height: 250px; "/>
            <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg"
            class="img-fluid" style="width: 300px; height: 250px; "/>
            <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg"
            class="img-fluid" style="width: 300px; height: 250px; "/>
            
        </a>
      </figure>
    </div>

  </div>
</div></center>-->

<br>
<br>
<br>
<br>


<link rel="stylesheet" href="{{ asset('css/pielGaleria.css') }}" />

<link rel="text/javascript" href="{{ asset('js/animacionGaleria.js') }}" />
<center>

<div style="width: 100%;">
<div class="col-md-6 col-md-offset-3">
<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
  <div class="carousel-inner">
  
  <div class="item active">
     
    <h1 style="font-family: Arial;">Productos</h1>

  </div>

    <?php $bandera = 0; ?>

    <?php $bandera2 = 0; ?>

    <?php $contador2 = 1; ?>

    <?php $contador3 = 1; ?>

    @foreach ($modeloTyCProducto as $t )

        <?php $contador = 1; ?>

        <?php $contador4 = 1; ?>

              @if($contador3<$numero)

                <div class="item">

                @foreach ($modeloTyCProducto as $c )

                  @if($contador4<=4)

                    @if($contador>=$contador2)

                      <?php $contador2 = $contador2 +1; ?>

                      <?php $contador = $contador+1; ?>

                      <?php $contador3 = $contador3+1; ?>

                      <?php $contador4 = $contador4+1; ?>

                      <div class="col-md-3 col-sm-6 col-xs-12"><a onclick="location.href='{{ url('/VerInformacionProductos/'.$c->id.'/') }}'"><img src="{{ asset($c->rutas_imagenes) }}" class="img-responsive"></a></div>
                    @else

                      <?php $contador = $contador+1; ?>

                    @endif

                  @endif

                @endforeach

                </div>

              @endif

      @endforeach
  
    
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev" ><i class="glyphicon glyphicon-chevron-left"></i></a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next" ><i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
</div>
</div>
</center>
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
<br>
<br>
<br>
<br>
<br>
@endsection
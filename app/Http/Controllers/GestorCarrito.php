<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\carrito;

use App\menu;

use App\categoria;

use App\productos;

use App\cliente;

class GestorCarrito extends Controller
{
    public function AgregarCarrito($codigo,$cantidad,$id){

    	$copiaCantidadProductos=session('cantidad');

    	$copiaCantidadProductos=$copiaCantidadProductos+$cantidad;

    	session()->put('cantidad', $copiaCantidadProductos);

    	$modelocarritoBuscar=carrito::where('fid_productos',$id)->where('estados',"PROCESO")->get()->first();

    	if(is_null($modelocarritoBuscar)){

    		$modelocarrito=new carrito;

	    	$llamadoPresentacionProducto=new PresentacionProducto();

	    	$ipaddress = $_SERVER['REMOTE_ADDR'];

	    	$modelocarrito->codigos=$codigo;

	    	$modelocarrito->fid_productos=$id;

	    	$modelocarrito->direcciones_IP=$ipaddress;

	    	$modelocarrito->cantidades_agregadas=$cantidad;

            $modelocarrito->estados="PROCESO";

	    	$modelocarrito->save();

	    	return $llamadoPresentacionProducto->MostrarDetallesDelProducto($id);

    	}else{

    		$modelocarrito=carrito::find($modelocarritoBuscar->id);

    		$copiaCantidad=$cantidad+$modelocarritoBuscar->cantidades_agregadas;

    		$modelocarrito->cantidades_agregadas=$copiaCantidad;

    		$modelocarrito->save();

    		$llamadoPresentacionProducto=new PresentacionProducto();

    		return $llamadoPresentacionProducto->MostrarDetallesDelProducto($id);

    	}

    }

    public function VerCarrito(){

    	$categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');

        $modelocarrito=carrito::where('direcciones_IP',$_SERVER['REMOTE_ADDR'])->where('estados',"PROCESO")->get();

        $productosCarrito=array();

        $productosCarritoCantidades=array();

        foreach ($modelocarrito as $key) {
        	
        	$modeloproductos=productos::find($key->fid_productos);

        	$productosCarrito[]=$modeloproductos;

        	$modelocarrito2=carrito::where('id',$key->id)->get()->first();

        	$productosCarritoCantidades[]=$modelocarrito2;

        }

    	return view('VistaCarrito',compact('categoria','sub_categoria','cantidad','productosCarrito','productosCarritoCantidades'));
    }
    public function BorrarProductosCarrito($id){

    	$modelocarrito2=carrito::where('id',$key->id)->get()->first();

    	$modelocarrito=carrito::where('id',$id)->delete();

    	$cantidad=session('cantidad');

    	$cantidad=$cantidad-$modelocarrito2->cantidades_agregadas;

    	session()->put('cantidad', $cantidad);

    	return $this->VerCarrito();

    }	

    public function GestionarTrasaccion(){

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');

        return view('VistaGuardarTransaccion',compact('categoria','sub_categoria','cantidad'));

    }

    public function GuardarTransaccion(Request $request){

        $modelocarrito=carrito::where('direcciones_IP',$_SERVER['REMOTE_ADDR'])->where('estados',"PROCESO")->get();

        $bandera=0;

        foreach ($modelocarrito as $key) {

            $modeloproductos=productos::find($key->fid_productos);

            $cantidadRestar=$modeloproductos->cantidades-$key->cantidades_agregadas;

            $totalPagar=$modeloproductos->precios*$key->cantidades_agregadas;

            $modeloproductos->cantidades=$cantidadRestar;

            $modeloproductos->save();

            $modelocliente=new cliente();

            $modelocliente->nombres=$request->input('NOMBRE');

            $modelocliente->apellidos=$request->input('APELLIDO');

            $modelocliente->cedula=$request->input('CEDULA');

            $modelocliente->direcciones_IP=$_SERVER['REMOTE_ADDR'];

            $modelocliente->direcciones=$request->input('DIRECCION');

            $modelocliente->fid_carrito=$key->id;

            $modelocliente->totales_cancelados_por_productos=$totalPagar;

            $modelocliente->save();

            $modelocarrito2=carrito::find($key->id);

            $modelocarrito2->estados="CANCELADO";

            $modelocarrito2->save();



            $bandera=1;
        }
        
        if($bandera==1){

            session()->put('cantidad', 0);

        }

        $llamadoPaginaPrincipal=new PaginaPrincipal;

         return $llamadoPaginaPrincipal->index();
        
    }
}

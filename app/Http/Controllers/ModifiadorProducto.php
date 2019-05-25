<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\menu;

use App\categoria;

use App\productos;

use Storage;

class ModifiadorProducto extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function VistaListarProducto(){

		$categoria=categoria::all();

        $sub_categoria=menu::all();

        $modeloTyCProducto=productos::all();

        $cantidad=session('cantidad');

        return view('VistaListarProductosParaEliminar',compact('categoria','sub_categoria','modeloTyCProducto','cantidad'));

	}

	public function EliminarProducto($id){

		$productos = productos::where('id',$id)->delete();

        return $this->VistaListarProducto();
	}

	public function ModificarProducto($id){

		$categoria=categoria::all();

                $sub_categoria=menu::all();

                $modeloTyCProducto=productos::all();

                $modeloTyCProducto2 = productos::find($id);

                $modeloTyCSubCategoria2=menu::find($modeloTyCProducto2->fid_menus);

                $modeloTyCCategoriaBusqueda2=categoria::find($modeloTyCSubCategoria2->fid_categorias);

                $cantidad=session('cantidad');

                return view('VistaModificarProducto',compact('modeloTyCProducto','modeloTyCProducto2','sub_categoria','modeloTyCSubCategoria2','categoria','modeloTyCCategoriaBusqueda2','cantidad'));

	}

        public function GuardarModificacionProducto(Request $request){

                $modeloTyCProducto = productos::find($request->input('idProducto'));

                $modeloTyCCategoria=categoria::where('nombres',$request->input('categoria'))->get()->first();

                $modeloTyCSubCategoria=menu::where('nombres',$request->input('subCatgoria'))->get()->first();

                if(!is_null($modeloTyCCategoria)&& !is_null($modeloTyCSubCategoria)){

                    if($request->file('UrlImg2')!=null){

                        if($modeloTyCProducto->rutas_imagenes!="imagenProducto/placeholder.png"){

                            unlink(public_path($modeloTyCProducto->rutas_imagenes));

                        }

                        $ruta=time().'_'.$request->file('UrlImg2')->getClientOriginalName();

                        Storage::disk('imagenProducto')->put($ruta,file_get_contents($request->file('UrlImg2')->getRealPath()));

                        $ruta1='imagenProducto/'.$ruta;

                        $modeloTyCProducto->rutas_imagenes=$ruta1;

                    }

                    $modeloTyCProducto->nombres=$request->input('nombreProducto');

                    $modeloTyCProducto->cantidades=$request->input('cantidadProducto');

                    $modeloTyCProducto->fid_menus=$modeloTyCSubCategoria->id;

                    $modeloTyCProducto->precios=$request->input('precioProducto');

                    $modeloTyCProducto->descripciones=$request->input('descripcionProducto');

                    $modeloTyCProducto->codigos=$request->input('codigoProducto');

                    $modeloTyCProducto->save();

                    return $this->VistaListarProducto();

                }else{

                    dd("Tiene que ingresar una categoria valida ya la categoria a la que esta tratando de agregar el producto no se encuentra");

                }

        }

        public function EliminarImagen(){

                
        }

}

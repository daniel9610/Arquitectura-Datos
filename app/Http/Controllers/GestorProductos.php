<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\menu;

use App\categoria;

use App\productos;
use App\Ingrediente;
use Storage;

use Excel;

class GestorProductos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function VistaAgregarProducto(){


        $categoria=categoria::all();
        $sub_categoria=menu::all();
        $ingredientes = Ingrediente::all();
        $cantidad=session('cantidad');

        return view('VistaAgregarProducto',compact('categoria','sub_categoria','cantidad', 'ingredientes'));
        
    }

    public function GuardarProducto(Request $request){

        $categoria = categoria::where('nombres',$request->input('categoria'))->get()->first();

            if(!is_null($categoria)){

                $sub_categoria= menu::where('nombres',$request->input('subCatgoria'))->get()->first();

                if(!is_null($sub_categoria)){

                    if($request->file('UrlImg2')!=null){

                        $ruta=time().'_'.$request->file('UrlImg2')->getClientOriginalName();

                        Storage::disk('imagenProducto')->put($ruta,file_get_contents($request->file('UrlImg2')->getRealPath()));

                        $ruta1='imagenProducto/'.$ruta;

                        $productos2=new productos;

                        $productos2->rutas_imagenes=$ruta1;

                        $productos2->cantidades=$request->input('cantidadProducto');

                        $productos2->nombres=$request->input('nombreProducto');

                        $productos2->precios=$request->input('precioProducto');
                        
                        $productos2->descripciones=$request->input('descripcionProducto');

                        $productos2->codigos=$request->input('codigoProducto');

                        $productos2->rutas_imagenes=$ruta1;

                        $productos2->fid_menus=$sub_categoria->id;

                        $productos2->save();

                    }else{

                        $$productos3=new productos;

                        $productos3->rutas_imagenes="imagenProducto/placeholder.png";

                        $productos3->cantidades=$request->input('cantidadProducto');

                        $productos3->nombres=$request->input('nombreProducto');

                        $productos3->precios=$request->input('precioProducto');
                        
                        $productos3->descripciones=$request->input('descripcionProducto');

                        $productos3->codigos=$request->input('codigoProducto');

                        $productos3->fid_menus=$sub_categoria->id;

                        $productos3->save();

                    }

                }

            }

            return $this->VistaAgregarProducto();
    }

    public function VistaImportacionMasiva(){

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');

        return view('VistaImportarProductosMasivamente',compact('categoria','sub_categoria','cantidad'));

    }

    public function GuardarImportarProductosMasivamente(Request $request){

        $img1=$request->file('UrlImg1');

        $ruta1=$img1->getClientOriginalName();

        Storage::disk('productoMasivo')->put($ruta1,file_get_contents($img1->getRealPath()));

        $ruta1='productoMasivo/'.$img1->getClientOriginalName();

        $ruta2=$ruta1;

        $files=$request->file('images');

        Excel::load($ruta2, function($archivo) use ($files){

            $resultado=$archivo->get();

            foreach ($resultado as $key => $value) {

                    $categoria = categoria::where('nombres',$value->categoria)->get()->first();

                    if(!is_null($categoria)){

                        $menu= menu::where('nombres',$value->sub_categoria)->get()->first();

                        if(!is_null($menu)){
                            
                            if($value->imagen!=null){

                                $bandera=0;

                                foreach ($files as $file) {
                                    
                                    if($value->imagen==$file->getClientOriginalName()){

                                        $bandera=1;

                                        $ruta=time().'_'.$file->getClientOriginalName();

                                        Storage::disk('imagenProducto')->put($ruta,file_get_contents($file->getRealPath()));

                                        $ruta1='imagenProducto/'.$ruta;

                                        $productos2=new productos;

                                        $productos2->rutas_imagenes=$ruta1;

                                        $productos2->cantidades=$value->cantidad;

                                        $productos2->nombres=$value->nombre;

                                        $productos2->precios=$value->precio;
                                        
                                        $productos2->descripciones=$value->descripcion;

                                        $productos2->codigos=$value->codigo;

                                        $productos2->rutas_imagenes=$ruta1;

                                        $productos2->fid_menus=$menu->id;

                                        $productos2->save();

                                    }

                                }

                                if($bandera==0){

                                    $productos3=new productos;

                                        $productos3->rutas_imagenes="imagenProducto/placeholder.png";

                                        $productos3->cantidades=$value->cantidad;

                                        $productos3->nombres=$value->nombre;

                                        $productos3->precios=$value->precio;
                                        
                                        $productos3->descripciones=$value->descripcion;

                                        $productos3->codigos=$value->codigo;

                                        $productos3->fid_menus=$menu->id;

                                        $productos3->save(); 

                                }

                            }else{

                                $productos4=new productos;

                                        $productos4->rutas_imagenes="imagenProducto/placeholder.png";

                                        $productos4->cantidades=$value->cantidad;

                                        $productos4->nombres=$value->nombre;

                                        $productos4->precios=$value->precio;
                                        
                                        $productos4->descripciones=$value->descripcion;

                                        $productos4->codigos=$value->codigo;

                                        $productos4->fid_menus=$menu->id;

                                        $productos4->save(); 

                            }
                        }

                    }

                

            }
        })->get();

        return $this->VistaImportacionMasiva();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

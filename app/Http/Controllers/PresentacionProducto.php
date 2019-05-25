<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\menu;

use App\categoria;

use App\productos;

class PresentacionProducto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function TomarDatosCarrito(Request $request){

        $LlamadoGestorCarrito = new GestorCarrito();  

        return $LlamadoGestorCarrito->AgregarCarrito($request->input('codigoProducto'),$request->input('cantidadProductos'),$request->input('idProducto'));

    }

    public function MostrarProductos($id){

        $modeloTyCProducto = productos::where('fid_menus',$id)->get();

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');

        return view('VistaCargarProductos',compact('modeloTyCProducto','categoria','sub_categoria','cantidad'));

    }

    public function MostrarDetallesDelProducto($id){

        $modeloTyCProducto = productos::find($id);

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');

        return view('VistaCargarInformacionProducto',compact('modeloTyCProducto','categoria','sub_categoria','cantidad'));

    }
    

    public function BuscarProducto(Request $request){

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');

        $ModeloTyCProducto=productos::where('nombres','LIKE','%'.$request->input('busqueda').'%')->get();

        $imagenes = array();

        $id = array();

        foreach ($ModeloTyCProducto as $key ) {

                    $imagenes[]=$key->rutas_imagenes;

                    $id[]=$key->id;

                

        }

            $numero=Count($id);

            return view('VistaBarraDeBusquedaProducto',compact('imagenes','ModeloTyCProducto','categoria','sub_categoria','id','numero','cantidad'));
    }

    public function index()
    {
        //
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

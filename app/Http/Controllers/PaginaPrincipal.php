<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\menu;

use App\categoria;

use App\productos;

class PaginaPrincipal extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        session_start();

        $inicio=0;

        $inicio=$inicio+session('cantidad');

        session()->put('cantidad', $inicio);

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $modeloTyCProducto=productos::all();

        $numero=count($modeloTyCProducto);

        $cantidad=session('cantidad');

        return view('VistaPrincipal',compact('categoria','sub_categoria','numero','modeloTyCProducto','cantidad'));

    }

    public function VistaVerHistoria(){

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');
        
        return view('VistaHistoria',compact('categoria','sub_categoria','cantidad'));
    }

    public function VistaVerContactos(){

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');
        
        return view('VistaContactos',compact('categoria','sub_categoria','cantidad'));
        
        
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

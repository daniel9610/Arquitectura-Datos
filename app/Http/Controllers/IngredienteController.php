<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productos;

class IngredienteController extends Controller
{
    public function index($ingrediente) {
        $productos = productos::all();
        $ingrediente = Ingrediente::where('ingrediente_id', $ingrediente->id);
        $nuevoIngrediente = new Task;
        return view('ingredientes', compact('ingrediente', 'productos'));
    
      }
    

      public function store($productos, Request $request) {
        $productos = productos::findOrFail($productos);
        $ingrediente = new ingrediente;
        $ingrediente->productos_id = $productos->id;
        $ingrediente->nombre =$request->nombre;
        $ingrediente->save();
        return redirect()->route('VerInformacionProductos', $productos->id);
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



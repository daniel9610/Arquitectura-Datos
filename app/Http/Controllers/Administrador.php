<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\menu;

use App\categoria;

use App\User;

class Administrador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  

    public function  index(){

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');

        return view('VistaPanelAdministracion',compact('categoria','sub_categoria','cantidad'));

    }

    public function VistaAgregarCategoria()
    {
        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');

        return view('VistaAgregarCategoria',compact('categoria','sub_categoria','cantidad'));
    }

    public function GuardarCategoria(Request $request){

        $categoria=new categoria;

        $sub_categoria=new menu;

        $categoria->nombres=$request->input('categoria');

        $categoria->save();

        $sub_categoria->nombres=$request->input('subCatgoria');

        $sub_categoria->fid_categorias=$categoria->id;

        $sub_categoria->save();

        return $this->VistaAgregarCategoria();

    }

    public function VistaAgregarAdministrador(){

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');

        return view('VistaAgregarAdministrador',compact('categoria','sub_categoria','cantidad'));

    }

    public function VistaEliminarAdministrador(){

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $modeloUser=User::all();

        $cantidad=session('cantidad');

        return view('VistaEliminarAdministrador',compact('categoria','sub_categoria','modeloUser','cantidad'));
    }

    public function EliminarAdministrador($id){

        $modeloUser=User::where('id',$id)->delete();

        return $this->VistaEliminarAdministrador();

    }

    public function VistaListaModificarAdministrador(){

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $modeloUser=User::all();

        $cantidad=session('cantidad');

        return view('VistaListarAdministradoresParaModificar',compact('categoria','sub_categoria','modeloUser','cantidad'));
    }

    public function VistaModificarAdministrador($id){


        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');

        $modeloUser=User::where('id',$id)->get()->first();

        return view('VistaModificarAdministrador',compact('categoria','sub_categoria','modeloUser','cantidad'));

    }

    public function GuardarModificacionAdministrador(Request $request){

        $modeloUser=User::find($request->input('id'));

        if((!is_null($modeloUser))&&(!is_null($request->input('name')))&&(!is_null($request->input('email')))){

            $modeloUser->name=$request->input('name');

            $modeloUser->email=$request->input('email');

            $modeloUser->save();

        }else{

            dd("Rotonda");

        }

        return $this->VistaListaModificarAdministrador();

    }

    public function VistaCambiarContrasenaAdministrador(){

        $categoria=categoria::all();

        $sub_categoria=menu::all();

        $cantidad=session('cantidad');

        return view('VistaCambiarContrasena',compact('categoria','sub_categoria','cantidad'));
    }

    public function GuardarCambiarContrasenaAdministrador(){

        $modeloUser=User::where('email',$request->input('email'))->where('name',$request->input('nombre'))->delete();

        if($modeloUser==0){

            $copia = array();

            $copia['name']=$request->input('nombre');

            $copia['email']=$request->input('email');   

            $copia['password']=$request->input('password_confirmation');         

            $ControllerRegisterController=new RegisterController();

            return $ControllerRegisterController->intermediario($copia);

        }else{


        }
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

<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\User;
use resca\Persona;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\UserFormRequest;
use DB;

class UserController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')
    		->orderBy('id','desc')
    		->paginate(999999);
    		return view('admin.user.index',["usuarios"=>$usuarios,"searchText"=>$query]);
    	   
        }
    }

    public function create(){
    $personas=DB::table('users')->where('condicion','=','1')->get();
    	return view("admin.user.create",["personas"=>$personas]);
    }

    public function store(PersonaFormRequest $request){
    	$persona=new Persona;
        $persona->nombrepersona=$request->get('nombre');
       	$persona->apellidospersona=$request->get('apellidos');
       	$persona->dnipersona=$request->get('dni');
       	$persona->telefonopersona=$request->get('telefono');
       	$persona->direccionpersona=$request->get('direccion');
       	$persona->emailpersona=$request->get('email');
        $persona->idcargo=$request->get('idcargo');
        $persona->identidad=$request->get('identidad');
    	  $persona->condicion='1';
   		  $persona->save();
   		return Redirect::to('admin/persona');
    }

    public function show($idpersona){
    	return view("admin.persona.show",["persona"=>persona::findOrFail($idpersona)]);
    }

    public function edit($idpersona){
        $persona=Persona::findOrFail($idpersona);
        $cargos=DB::table('cargo')->where('condicion','=','1')->get();
        $entidades=DB::table('entidad')->where('condicion','=','1')->get();
      return view("admin.persona.edit",["persona"=>$persona,"cargos"=>$cargos,"entidades"=>$entidades]);
    }
    public function update(PersonaFormRequest $request,$idpersona){
    	$persona=persona::findOrFail($idpersona);
        $persona->nombrepersona=$request->get('nombre');
       	$persona->apellidospersona=$request->get('apellidos');
       	$persona->dnipersona=$request->get('dni');
       	$persona->telefonopersona=$request->get('telefono');
       	$persona->direccionpersona=$request->get('direccion');
       	$persona->emailpersona=$request->get('email');
        $persona->idcargo=$request->get('idcargo');
        $persona->identidad=$request->get('identidad');
    	$persona->update();
    	return Redirect::to('admin/persona');    	
    }
    public function destroy($idpersona){
    	$persona=persona::findOrFail($idpersona);
    	$persona->condicion='0';
    	$persona->update();
    	return Redirect::to('admin/persona');
    }
}

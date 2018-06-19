<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Persona;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\PersonaFormRequest;
use DB;

class PersonaController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$personas=DB::table('persona as p')
        ->join('cargo as c','p.idcargo','=','c.idcargo')
        ->join('entidad as e','p.identidad','=','e.identidad')
        ->select('p.idpersona','p.nombrepersona','p.apellidospersona','p.dnipersona','p.telefonopersona','p.direccionpersona','p.emailpersona','c.nombrecargo as cargo','e.nombreentidad as entidad')
        ->where('p.nombrepersona','LIKE','%'.$query.'%')
    		->where('p.condicion','=','1')
    		->orderBy('p.idpersona','desc')
    		->paginate(100);
    		return view('admin.persona.index',["personas"=>$personas,"searchText"=>$query]);
        }
    }

    public function create(){
    $entidades=DB::table('entidad')->where('condicion','=','1')->get();
    $cargos=DB::table('cargo')->where('condicion','=','1')->get(); 
    	return view("admin.persona.create",["cargos"=>$cargos],["entidades"=>$entidades]);
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

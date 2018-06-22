<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Representante;
use resca\Persona;
use resca\Entidad;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\RepresentanteFormRequest;
use DB;

class RepresentanteController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$entidades=DB::table('actividad as a')
        ->join('entidad as e','e.idactividad','=','a.idactividad')
        ->leftjoin('representante as r','r.identidad','=','e.identidad')
        ->leftjoin('persona as p','r.idpersona','=','p.idpersona')
        ->select('e.identidad','e.nombreentidad','e.direccionentidad','e.telefonoentidad','e.emailentidad','e.rucentidad','a.nombreactividad as actividad',DB::raw('CONCAT(p.nombrepersona," ",p.apellidospersona) AS representante'))
        ->where('e.nombreentidad','LIKE','%'.$query.'%')
    		->where('e.condicion','=','1')
    		->orderBy('actividad','desc')
    		->paginate(99999);
    		return view('admin.entidad.index',["entidades"=>$entidades,"searchText"=>$query]);
        }
    }

    public function edit($identidad){
         $entidad=Entidad::findOrFail($identidad);
        $personas=DB::table('persona')->select(DB::raw('CONCAT(persona.nombrepersona," ",persona.apellidospersona) AS nombres'),'persona.idpersona')->where('condicion','=','1')->get();
        return view("admin.representante.edit",["entidad"=>$entidad,"personas"=>$personas]);
    }



    public function update(RepresentanteFormRequest $request,$idrepresentante){
      $representante=new Representante;
        $representante->descripcionrepresentante=$request->get('descripcion');
        $representante->identidad=$request->get('identidad');
        $representante->idpersona=$request->get('idpersona');
      $representante->save();

      return Redirect::to('admin/entidad');   
    }

    public function show($idrepresentante){
        return view("admin.entidad.show",["representante"=>representante::findOrFail($idrepresentante)]);
    }



}

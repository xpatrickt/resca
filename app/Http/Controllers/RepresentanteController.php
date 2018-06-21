<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Representante;
use resca\Persona;
use resca\Controller;
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



    public function edit($idestudio){
         $estudio=Estudio::findOrFail($idestudio);
        $personas=DB::table('persona')->select(DB::raw('CONCAT(persona.nombrepersona," ",persona.apellidospersona) AS nombres'),'persona.idpersona')->where('condicion','=','1')->get();
        return view("admin.evaluacionestudio.edit",["estudio"=>$estudio,"personas"=>$personas]);
    }



    public function update(EvaluacionestudioFormRequest $request,$idevaluacionestudio){
      $evaluacionestudio=new Evaluacionestudio;
        $evaluacionestudio->idestudio=$request->get('idestudio');
        $evaluacionestudio->idpersona=$request->get('idpersona');
      $evaluacionestudio->save();
        $estadoestudio=new Estadoestudio;
        $estadoestudio->idestudio=$request->get('idestudio');
        $estadoestudio->idestado=$request->get('idestado');
        $estadoestudio->save();
      return Redirect::to('admin/evaluacionestudio');   
    }

    public function show($idevaluacionestudio){
        return view("admin.evaluacionestudio.show",["evaluacionestudio"=>evaluacionestudio::findOrFail($idevaluacionestudio)]);
    }



}

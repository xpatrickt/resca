<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Persona;
use resca\Estudio;
use resca\Evaluacionestudio;
use resca\Estadoestudio;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\EvaluacionestudioFormRequest;
use DB;

class EvaluacionestudioController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){

      if($request){
            $query=trim($request->get('searchText'));
            $estudios=DB::table('estudio as e')
            ->join('proyecto as p','p.idproyecto','=','e.idproyecto')
            ->join('entidad as en','p.identidad','=','en.identidad')
            ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
            ->join('estado as est','es.idestado','=','est.idestado')
            ->select('e.idestudio','e.nombreestudio','e.descripcionestudio','p.nombreproyecto as proyecto','en.nombreentidad as entidad','est.nombreestado as estado','es.idestudio')
            ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
            ->where('e.nombreestudio','LIKE','%'.$query.'%')
            ->where('e.condicion','=','1')
            ->where('es.idestado','<','3')
           // ->groupBy('es.idestudio','')
       //  ->having('es.idestudio','<','3')
            ->orderBy('es.idestudio','desc')
            ->paginate(999999);
            return view('admin.evaluacionestudio.index',["estudios"=>$estudios,"searchText"=>$query]);
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

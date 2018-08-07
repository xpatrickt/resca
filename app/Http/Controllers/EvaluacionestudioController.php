<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Persona;
use resca\Estudio;
use resca\Evaluacionestudio;
use resca\Estadoestudio;
use resca\Tipoevaluacion;
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
            ->join('tipoestudio as te','e.idtipoestudio','=','te.idtipoestudio')
            ->join('tiposolicitud as ts','e.idtiposolicitud','=','ts.idtiposolicitud')
            ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
            ->join('estado as est','es.idestado','=','est.idestado')       
            ->select('e.idestudio','te.nombretipoestudio','e.nombreestudio','ts.nombretiposolicitud','e.codigosige','e.descripcionestudio','p.nombreproyecto as proyecto','en.nombreentidad as entidad','est.nombreestado as estado','es.idestudio','es.created_at as fecha')
            ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
            ->where('e.nombreestudio','LIKE','%'.$query.'%')
            ->where('e.condicion','=','1')
            ->where('ts.idtiposolicitud','=','2')            
            ->where('es.idestado','=','2')
           // ->groupBy('es.idestudio','')
       //  ->having('es.idestudio','<','3')
            ->orderBy('es.idestudio','desc')
            ->paginate(999999);
            return view('admin.evaluacionestudio.index',["estudios"=>$estudios,"searchText"=>$query]);
        }       
    }


   public function edit($idestudio){
        $tipoevaluaciones=DB::table('tipoevaluacion')->where('condicion','=','1')->get();
        $estudio=Estudio::findOrFail($idestudio);
        $personas=DB::table('persona as p')
        ->join('users as u','p.idpersona','=','u.idpersona')
        ->join('role_user as ru','ru.user_id','=','u.id')
        ->select(DB::raw('CONCAT(p.nombrepersona," ",p.apellidospersona) AS nombres'),'p.idpersona')
        ->where('p.condicion','=','1')
        ->where('ru.role_id','=','2')
        ->get();
        return view("admin.evaluacionestudio.edit",["estudio"=>$estudio,"personas"=>$personas,"tipoevaluaciones"=>$tipoevaluaciones]);
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
        $idestudios=$request->get('idestudio');
        $estudio=Estudio::findOrFail($idestudios);
        $estudio->idtipoevaluacion=$request->get('idtipoevaluacion');
        $estudio->update();
    	return Redirect::to('admin/evaluacionestudio'); 	
    }

    public function show($idevaluacionestudio){
        return view("admin.evaluacionestudio.show",["evaluacionestudio"=>evaluacionestudio::findOrFail($idevaluacionestudio)]);
    }

    public function destroy($idestudio){
        $estadoestudio=new Estadoestudio;
        $estadoestudio->idestudio=$idestudio;
        $estadoestudio->idestado='9';
        $estadoestudio->save();
        return Redirect::to('admin/evaluacionestudio');
    }


}

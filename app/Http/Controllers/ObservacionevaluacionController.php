<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Observacionevaluacion;
use resca\Estudio;
use resca\Proyecto;
use resca\Http\Requests\ObservacionevaluacionFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;
use Response;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class ObservacionevaluacionController extends Controller
{
    public function __construct(){

    }
   
 public function index(Request $request){

      if($request){
        $query=trim($request->get('searchText'));
        $idestudio=$request->get('idestudio');
        $idproyecto=$request->get('idproyecto');
        $estudio=Estudio::findOrFail($idestudio);
        $proyecto=Proyecto::findOrFail($idproyecto);
        $asuntoobservacion=null;
        $descripcionobservacion=null;
        return view("admin.observacionevaluacion.index",["proyecto"=>$proyecto,"query"=>$query,"estudio"=>$estudio,"asuntoobservacion"=>$asuntoobservacion,"descripcionobservacion"=>$descripcionobservacion]);
    }

}
  public function store(Request $request){
       $idestudio=$request->get('idestudio');
       $idproyecto=$request->get('idproyecto');
       $estudio=Estudio::findOrFail($idestudio);
       $proyecto=Proyecto::findOrFail($idproyecto);
       $asuntoobservacion=$request->get('asuntoobservacion');
    if($asuntoobservacion!=""){
      
       $descripcionobservacion=$request->get('descripcionobservacion');
       $evaluacionestudio=DB::table('evaluacionestudio')->where('idestudio','=',$idestudio)->where('condicion','=','1')
        ->orderBy('idevaluacionestudio', 'desc') ->limit(1)->get();

          foreach($evaluacionestudio as $e)
          {
             $idevaluacion=$e->idevaluacionestudio;
           }
            $observacion=new Observacionevaluacion;
            $observacion->asuntoobservacion=$asuntoobservacion;
            $observacion->descripcionobservacion=$descripcionobservacion;
            $observacion->condicion='1';
            $observacion->idevaluacionestudio=$idevaluacion;
            $observacion->save();
         return view("admin.observacionevaluacion.index",["proyecto"=>$proyecto,"estudio"=>$estudio,"asuntoobservacion"=>$asuntoobservacion,"descripcionobservacion"=>$descripcionobservacion]);
    } 
    return view("admin.observacionevaluacion.index",["proyecto"=>$proyecto,"estudio"=>$estudio]);  
    //return view('admin.distrito.index',["distritos"=>$distritos,"searchText"=>$query]);
   }

      public function destroy($iddepartamento){
        $departamento=departamento::findOrFail($iddepartamento);
        $departamento->condicion='0';
        $departamento->update();
        return Redirect::to('admin/departamento');
    }
     public function show($idproyecto){
        //return Redirect::to('admin/evaluacion');
    }


}

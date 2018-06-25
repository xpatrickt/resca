<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Observacionevaluacion;
use resca\Documentoobservacion;
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
        $idobservacion=null;
        return view("admin.observacionevaluacion.index",["proyecto"=>$proyecto,"query"=>$query,"estudio"=>$estudio,"asuntoobservacion"=>$asuntoobservacion,"descripcionobservacion"=>$descripcionobservacion,"idobservacion"=>$idobservacion]);
    }

}
  public function store(Request $request){
       $idestudio=$request->get('idestudio');
       $idproyecto=$request->get('idproyecto');
       $idobservacion=$request->get('idobservacion');
       $estudio=Estudio::findOrFail($idestudio);
       $proyecto=Proyecto::findOrFail($idproyecto);
       $asuntoobservacion=$request->get('asuntoobservacion');
       $descripcionobservacion=$request->get('descripcionobservacion');

    if($asuntoobservacion!="" or $asuntoobservacion!=" "){
         //OJOOOOO AQUIIII ARREGLAR
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
           
            $obs=DB::table('observacion')->where('asuntoobservacion','=',$asuntoobservacion)->where('condicion','=','1')
          ->orderBy('idobservacion','desc') ->limit(1)->get();
           foreach ($obs as $o) {
             $idobservacion=$o->idobservacion;
           }

         return view("admin.observacionevaluacion.index",["proyecto"=>$proyecto,"estudio"=>$estudio,"asuntoobservacion"=>$asuntoobservacion,"descripcionobservacion"=>$descripcionobservacion,"idobservacion"=>$idobservacion]);
      } 
   }

    public function update(Request $request,$idobservacion){
      $resolucion=new Documentoobservacion;
        $resolucion->nombreresolucion=$request->get('nombre');
        $resolucion->descripcionresolucion=$request->get('descripcion');

        $fecha = DateTime::createFromFormat('d/m/Y',$request->get('fecha'));
        $resolucion->fecharesolucion=$fecha->format('Y-m-d');

       // $resolucion->fecharesolucion=date('Y-m-d', strtotime($request->get('fecha')));
      //  $fecha = Carbon::createFromFormat('Y-m-d', $request->input('fecha'))->format('d-m-Y');
      //  $resolucion->fecharesolucion=date('d-m-Y', strtotime(str_replace('-', '/', $request['fecha'])));
       // $resolucion->fecharesolucion= $request->get('fecha');
       if(Input::hasFile('documento')){
            $file=Input::file('documento');
            $nombred=date("dmyHis"); 
            $file->move(public_path().'/documentos/resolucion/',$nombred.'.pdf');
            $resolucion->urlresolucion='/documentos/resolucion/'.$nombred.'.pdf';
        }
        $resolucion->idestudio=$request->get('idestudio');
      $resolucion->save();
        $estadoestudio=new Estadoestudio;
        $estadoestudio->idestudio=$request->get('idestudio');
        $estadoestudio->idestado=$request->get('idestado');
        $estadoestudio->save();
      return Redirect::to('admin/certificacion');   
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

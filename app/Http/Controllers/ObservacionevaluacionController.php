<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Observacionevaluacion;
use resca\Documentoobservacion;
use resca\Estudio;
use resca\Estadoestudio;
use resca\Proyecto;
use resca\Http\Requests\ObservacionevaluacionFormRequest;
use resca\Http\Requests\DocumentoobservacionFormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;
use Response;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use DateTime;

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
        $idobservacion="0";
        $documentos=DB::table('documentoobservacion')->where('idobservacion','=',$idobservacion)->where('condicion','=','1')
        ->orderBy('iddocumentoobservacion', 'desc') ->get();
        return view("admin.observacionevaluacion.index",["proyecto"=>$proyecto->idproyecto,"query"=>$query,"estudio"=>$estudio->idestudio,"nombreestudio"=>$estudio->nombreestudio,"asuntoobservacion"=>$asuntoobservacion,"descripcionobservacion"=>$descripcionobservacion,"idobservacion"=>$idobservacion,"documentos"=>$documentos]);
    }

}

  // MOSTRAR PARA AGREGAR OBSERVACION
     
     public function edit($idestudio){
        $estudio=Proyecto::findOrFail($idestudio);
        $idproyecto=$estudio->idproyecto; 
        $asunto="";
        $descripcion="";
        $documentos=DB::table('documentoobservacion')
                   ->where('estudio','=',$idestudio)
                   ->where('idobservacion','=','0')
                   ->where('condicion','=','1')
                  ->orderBy('iddocumentoobservacion', 'desc') ->get();
        
        if($request){

          if($request->get('')){

          }
          else{
          $departamentos=DB::table('departamento')->where('condicion','=','1')->get();
           return view("admin.provincia.edit",["provincia"=>$provincia,"departamentos"=>$departamentos]);
          }

        } 
    }


  // GUARDAR OBSERVACION DE EVALUACION
  public function store(Request $request){
    $asuntoobservacion=$request->get('asuntoobservacion');
    $descripcionobservacion=$request->get('descripcionobservacion');
       
    if($asuntoobservacion!="" && $descripcionobservacion!=""){

       $idestudio=$request->get('idestudio');
       $idproyecto=$request->get('idproyecto');
       $idobservacion=$request->get('idobservacion');
       $estudio=Estudio::findOrFail($idestudio);
       $proyecto=Proyecto::findOrFail($idproyecto);

         if($idobservacion=="0"){
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
               
            $idobservacion=$observacion->idobservacion;

            $estadoestudio=new Estadoestudio;
            $estadoestudio->idestudio=$idestudio;
            $estadoestudio->idestado='4';
            $estadoestudio->condicion='1';
            $estadoestudio->save();
           }
           $documentos=DB::table('documentoobservacion')->where('idobservacion','=',$idobservacion)->where('condicion','=','1')
        ->orderBy('iddocumentoobservacion', 'desc') ->get(); 

           return view("admin.observacionevaluacion.index",["proyecto"=>$proyecto->idproyecto,"estudio"=>$estudio->idestudio,"nombreestudio"=>$estudio->nombreestudio,"asuntoobservacion"=>$asuntoobservacion,"descripcionobservacion"=>$descripcionobservacion,"idobservacion"=>$idobservacion,"documentos"=>$documentos]);
        } 
           
   }

   // GUARDAR DOCUMENTOS OBSERVACION
    public function update(DocumentoobservacionFormRequest $request,$idobservacion){
      $asuntoobservacion=$request->get('asunto');
      $descripcionobservacion=$request->get('descripcion');
      $proyecto=$request->get('proyec');
      $estudio=$request->get('estu');
      $nombreestudio=$request->get('nestu');
      $documento=new Documentoobservacion;
      $documento->desdocumentoobservacion=$request->get('descripciondocumento');
      if(Input::hasFile('urlobs')){
            $file=Input::file('urlobs');
            $nombred=date("dmyHis"); 
            $file->move(public_path().'/admin/documentos/observacion/',$nombred.'.pdf');
            $documento->urldocumentoobservacion='/documentos/observacion/'.$nombred.'.pdf';
        }
      $documento->condicion='1';
      $documento->idobservacion=$idobservacion;
      $documento->save();

      $documentos=DB::table('documentoobservacion')->where('idobservacion','=',$idobservacion)->where('condicion','=','1')
        ->orderBy('iddocumentoobservacion', 'desc') ->get();

      return view("admin.observacionevaluacion.index",["proyecto"=>$proyecto,"estudio"=>$estudio,"nombreestudio"=>$nombreestudio,"asuntoobservacion"=>$asuntoobservacion,"descripcionobservacion"=>$descripcionobservacion,"idobservacion"=>$idobservacion,"documentos"=>$documentos]);
    }

      public function destroy($iddocumento){
        $departamento=Documentoobservacion::findOrFail($iddocumento);
        $departamento->condicion='0';
        $departamento->update();
        return Redirect::to('admin/departamento');
    }
     public function show($idproyecto){
        //return Redirect::to('admin/evaluacion');
    }


}

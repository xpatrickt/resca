<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Proyecto;
use resca\Estudio;
use resca\Departamento;
use resca\Provincia;
use resca\Evaluacionestudio;
use resca\Respuestaevaluacion;
use resca\Estadoestudio;
use resca\Entidad;
use resca\Persona;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use DB;
use Response;
use Illuminate\Support\Collection;
use Carbon\Carbon;


class EvaluacionController extends Controller
{
    public function __construct(){

    }
   
 public function index(Request $request){

      if($request){
           //LISTAR PROYECTOS 
        //sacar rol de usuario
        $idusuario = Auth::user()->id;
        $usuarios=DB::table('users as u')
        ->join('role_user as ru','ru.user_id','=','u.id')
        ->select('ru.role_id as idrol')
        ->where('u.id','=',$idusuario)
        ->where('u.condicion','=','1')
        ->get();
        foreach($usuarios as $us){
          $rol=$us->idrol;
        }
      //
        $query=trim($request->get('searchText'));

       if($rol=='1'){
           $proyectos=DB::table('proyecto')
           ->where('condicion','=','1')->get();
        }
        else{
           $proyectos=DB::table('proyecto as p')
           ->join('estudio as e','p.idproyecto','=','e.idproyecto')
           ->join('evaluacionestudio as ee','e.idestudio','=','ee.idestudio')
           ->join('persona as pe','pe.idpersona','=','ee.idpersona')
           ->join('users as u','u.idpersona','=','pe.idpersona')
           ->select('p.idproyecto','p.nombreproyecto','p.descripcionproyecto','p.objetivoproyecto','p.beneficiariosproyecto')
           ->where('u.id','=',$idusuario)
           ->where('p.condicion','=','1')
           ->where('pe.condicion','=','1')
           ->where('e.condicion','=','1')
           ->where('u.condicion','=','1')
            ->distinct()
           ->get();
       }
       //END LISTAR PROYECTOS
        $estudios=null;
        // tabs
        $documentos=null;
        $observaciones=null;
        $respuestasobservacion=null;
        //datos estudio
        $estudio=null; 
        $detalleestudio=null;
        //datosproyecto
        $proyecto=null;
        $entidades=null;
        return view("admin.evaluacion.index",["proyectos"=>$proyectos,"proyecto"=>$proyecto,"estudios"=>$estudios,"documentos"=>$documentos,"query"=>$query,"entidades"=>$entidades,"estudio"=>$estudio,"detalleestudio"=>$detalleestudio,"observaciones"=>$observaciones,"respuestasobservacion"=>$respuestasobservacion]);
    }

}



  public function store(Request $request){
   if($request){
      
       $idestudio=$request->get('estudio');
        $idproyecto=$request->get('proyecto');
        $query=trim($request->get('searchText'));
        
           //LISTAR PROYECTOS 
        //sacar rol de usuario
        $idusuario = Auth::user()->id;
        $usuarios=DB::table('users as u')
        ->join('role_user as ru','ru.user_id','=','u.id')
        ->select('ru.role_id as idrol')
        ->where('u.id','=',$idusuario)
        ->where('u.condicion','=','1')
        ->get();
        foreach($usuarios as $us){
          $rol=$us->idrol;
        }
      //
        $query=trim($request->get('searchText'));

       if($rol=='1'){
           $proyectos=DB::table('proyecto')
           ->where('condicion','=','1')->get();
        }
        else{
           $proyectos=DB::table('proyecto as p')
           ->join('estudio as e','p.idproyecto','=','e.idproyecto')
           ->join('evaluacionestudio as ee','e.idestudio','=','ee.idestudio')
           ->join('persona as pe','pe.idpersona','=','ee.idpersona')
           ->join('users as u','u.idpersona','=','pe.idpersona')
           ->select('p.idproyecto','p.nombreproyecto','p.descripcionproyecto','p.objetivoproyecto','p.beneficiariosproyecto')
           ->where('u.id','=',$idusuario)
           ->where('p.condicion','=','1')
           ->where('pe.condicion','=','1')
           ->where('e.condicion','=','1')
           ->where('u.condicion','=','1')
           ->distinct()
           ->get();
       }
       //END LISTAR PROYECTOS
       
        $estudios=null;
    if($idproyecto!=""){
        $estudios=DB::table('estudio as e')
                  ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
                  ->select('e.idestudio','e.nombreestudio') 
                   ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
                   ->where('e.idproyecto', $idproyecto)
                   ->where('es.idestado','>','2')
                   ->where('es.idestado','<','5')
                  ->where('e.condicion','=','1')->get();
                    //detalle proyecto
                    $proyecto=Proyecto::findOrFail($idproyecto);
                    $entidad=DB::table('entidad as e')
                                ->join('proyecto as p','e.identidad','=','p.identidad')
                                ->select('e.identidad','e.nombreentidad')
                                ->where('p.idproyecto','=',$idproyecto)
                                ->where('p.condicion','=','1')->get();

        if($idestudio!=""){
                   // detalle estudio
                    $estudio=Estudio::findOrFail($idestudio);
                    $detalleestudio=DB::table('estudio as e')
                  ->join('tipoevaluacion as te','e.idtipoevaluacion','=','te.idtipoevaluacion')
                  ->join('tipoestudio as tes','e.idtipoestudio','=','tes.idtipoestudio')
                  ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
                  ->join('estado as est','es.idestado','=','est.idestado')
                  ->select('e.idestudio','e.descripcionestudio','te.nombretipoevaluacion as tipoevaluacion','tes.nombretipoestudio as tipoestudio','est.nombreestado')
                  ->whereRaw('es.idestadoestudio IN (select MAX(es.idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
                  ->where('e.idestudio','=',$idestudio)
                  ->where('e.condicion','=','1')->orderBy('es.idestadoestudio','desc')->limit(1)->get();
 
        $documentos=DB::table('documentoestudio as d')
                    ->join('documento as do','do.iddocumento','=','d.iddocumento')
                    ->select('d.iddocumentoestudio','d.descdocumentoestudio','d.urldocumentoestudio','d.created_at','d.idestudio','do.nombredocumento as tipodocumento')
                    ->where('d.condicion','=','1')
                    ->where('d.idestudio','=',$idestudio)
                    ->orderBy('d.iddocumentoestudio','desc')->get();
        $observaciones=DB::table('observacion as o')
                    ->join('evaluacionestudio as e','o.idevaluacionestudio','=','e.idevaluacionestudio')
                    ->join('persona as p','e.idpersona','=','p.idpersona')
                    ->select('o.idobservacion','o.descripcionobservacion','o.asuntoobservacion',DB::raw('SUBSTRING(o.asuntoobservacion,1,30) as asobservacion'),'o.condicion','o.created_at','e.idpersona',DB::raw('CONCAT(p.nombrepersona," ",p.apellidospersona) AS nombres'),DB::raw('SUBSTRING(CONCAT(p.nombrepersona," ",p.apellidospersona),1,30) as nombre'))
                    ->where('e.idestudio','=',$idestudio)
                    ->orderBy('o.idobservacion','desc')->get();
        $respuestasobservacion=DB::table('respuestaobservacion as r')
                    ->join('observacion as o','o.idobservacion','=','r.idobservacion')
                    ->join('evaluacionestudio as e','o.idevaluacionestudio','=','e.idevaluacionestudio')
                    ->select('r.idrespuestaobservacion','r.descripcionrespuesta','r.asuntorespuesta',DB::raw('SUBSTRING(r.asuntorespuesta,1,30) as asrespuesta'),'r.created_at','r.condicion','o.asuntoobservacion',DB::raw('SUBSTRING(o.asuntoobservacion,1,30) as asobservacion'))
                    ->where('e.idestudio','=',$idestudio)
                    ->orderBy('r.idrespuestaobservacion','desc')->get();
          }
          else{
        $estudio=null;
        $detalleestudio=null;
        $documentos=null;
        $observaciones=null;
        $respuestasobservacion=null;
          }
     }

    else{
        $proyecto=null;
        $entidad=null;
        $estudio=null;
        $detalleestudio=null;
        $documentos=null;
        $observaciones=null;
        $respuestasobservacion=null;
        
    }
    return view("admin.evaluacion.index",["proyectos"=>$proyectos,"proyecto"=>$proyecto,"estudio"=>$estudio,"estudios"=>$estudios,"documentos"=>$documentos,"query"=>$query,"entidad"=>$entidad,"detalleestudio"=>$detalleestudio,"observaciones"=>$observaciones,"respuestasobservacion"=>$respuestasobservacion]);
 }
 else{
     return Redirect::to('admin/evaluacion');
}
}
    //RECHAZAR ESTUDIO
    public function destroy($idestudio){
       $estadoestudio=new Estadoestudio;
        $estadoestudio->idestudio=$idestudio;
        $estadoestudio->idestado='6';
        $estadoestudio->condicion='1';
        $estadoestudio->save();
      return Redirect::to('admin/evaluacion'); 
    }
    //ACEPTAR ESTUDIO
    public function update($idestudio){
        $estadoestudio=new Estadoestudio;
        $estadoestudio->idestudio=$idestudio;
        $estadoestudio->idestado='5';
        $estadoestudio->condicion='1';
        $estadoestudio->save();
      return Redirect::to('admin/evaluacion'); 
    }

     public function show($idproyecto){
        return Redirect::to('admin/evaluacion');
    }
    
    //LISTAR ESTUDIOS
    function listar(Request $request)
    {
     
     $proyecto = $request->get('select'); //proyecto
     $idproyecto = $request->get('value');  //valor
     $estudio = $request->get('dependent'); //estudio

     $data = DB::table('proyecto as p')
     ->join('estudio as e', 'e.idproyecto','=','p.idproyecto')
     ->join('estadoestudio as est','est.idestudio','=','e.idestudio')
     ->select('e.idestudio','e.nombreestudio')
      ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
       ->where('e.idproyecto', $idproyecto)
       ->where('est.idestado','>','2')
       ->where('est.idestado','<','5')
       ->get();
     $output = '<option value="">Seleccione '.ucfirst($estudio).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->idestudio.'">'.$row->idestudio.'-'.$row->nombreestudio.'</option>';
     }
     echo $output;
    }

    //LISTAR DATOS DE ESTUDIOS
    function listarall(Request $request)
    {
     
     $select = $request->get('select'); // proyecto
     $value = $request->get('value');  //valor
     $ta = $request->get('ta'); //tproyecto

     if($select=='proyecto'){
     $proyectos=DB::table('proyecto as p')
                     ->join('entidad as e','p.identidad','=','e.identidad')
                     ->select('p.idproyecto','p.descripcionproyecto','p.objetivoproyecto','p.beneficiariosproyecto','e.nombreentidad as entidad')
                     ->where('p.idproyecto','=',$value)
                     ->where('p.condicion','=','1')->get();
     foreach($proyectos as $pro)
     {
      $output = '<label>Descripción: </label> '.$pro->descripcionproyecto.'<br>';
      $output .= '<label>Objetivo: </label> '.$pro->objetivoproyecto.'<br>';
      $output .= '<label>Beneficiarios: </label> '.$pro->beneficiariosproyecto.'<br>';
      $output .= '<label>Entidad: </label> '.$pro->entidad.'<br>';
     }
     }
     if($select=='estudio'){
     $estudios=DB::table('estudio as e')
                  ->join('tipoevaluacion as te','e.idtipoevaluacion','=','te.idtipoevaluacion')
                  ->join('tipoestudio as tes','e.idtipoestudio','=','tes.idtipoestudio')
                  ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
                  ->join('estado as est','es.idestado','=','est.idestado')
                  ->select('e.idestudio','e.descripcionestudio','te.nombretipoevaluacion as tipoevaluacion','tes.nombretipoestudio as tipoestudio','est.nombreestado','es.idestadoestudio')
                  ->whereRaw('es.idestadoestudio IN (select MAX(es.idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
                  ->where('e.idestudio','=',$value)
                  ->where('e.condicion','=','1')->orderBy('es.idestadoestudio','desc')->limit(1)->get();
                  $output="";
     foreach($estudios as $est)
     {
      $output .= '<label>Tipo evaluacion: </label> '.$est->tipoevaluacion.'<br>';
      $output .= '<label>Tipo estudio: </label> '.$est->tipoestudio.'<br>';
      $output .= '<label>Estado: </label> '.$est->nombreestado.'<br>';
     }
     }

     echo $output;
    }

    // MOSTRAR DOCUMENTO OBSERVACION

     function mostrardocumento(Request $request)
    {
     
          $idobservacion = $request->get('idobs'); // estudio

         $data=DB::table('documentoobservacion')
        ->select('iddocumentoobservacion','desdocumentoobservacion','urldocumentoobservacion','created_at')
        ->where('idobservacion','=',$idobservacion)
        ->where('condicion','=','1')
        ->orderBy('iddocumentoobservacion','desc') ->get();
    
    $output = '';
  
     foreach($data as $row)
     {
   $output .= '<a href="../'.$row->urldocumentoobservacion.'"  target="_blank" class="btn btn-app">
                <i class="fa fa-file-pdf-o"></i>'.
                   $row->desdocumentoobservacion.
              '</a>';
     }
     $output .= '';

          
     echo $output;
    }

      // MOSTRAR DOCUMENTO RESPUESTA

     function mostrarrespuesta(Request $request)
    {
     
        $idrespuesta = $request->get('idresp'); // estudio

      //cambiando condicion de respuesta (leido)

      $respuesta=Respuestaevaluacion::findOrFail($idrespuesta);
      $respuesta->condicion='2';
      $respuesta->update();

      //mostrando documentos en modal

       $data=DB::table('documentoestudio as d')
              ->join('respuestaobservacion as r','r.iddocumentoestudio','=','d.iddocumentoestudio')
              ->select('d.iddocumentoestudio','d.descdocumentoestudio','d.urldocumentoestudio','d.created_at')
              ->where('r.idrespuestaobservacion','=',$idrespuesta)
              ->where('d.condicion','=','1')
              ->orderBy('d.iddocumentoestudio','desc') ->get();
    
    $output = '';
  
     foreach($data as $row)
     {
   $output .= '<a href="../'.$row->urldocumentoestudio.'"  target="_blank" class="btn btn-app">
                <i class="fa fa-file-pdf-o"></i>'.
                   $row->descdocumentoestudio.
              '</a>';
     }
     $output .= '';

          
     echo $output;
    }

}

<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Proyecto;
use resca\Estudio;
use resca\Departamento;
use resca\Provincia;
use resca\Evaluacionestudio;
use resca\Entidad;
use resca\Persona;
use Illuminate\Support\Facades\Redirect;
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
        $query=trim($request->get('searchText'));
        $proyectos=DB::table('proyecto')->where('condicion','=','1')->get();
        $estudios=DB::table('estudio')->where('condicion','=','1')->get();
        $departamentos=DB::table('departamento')->where('condicion','=','1')->get();
        $entidades=DB::table('entidad')->where('condicion','=','1')->get();
        $tiposevaluacion=DB::table('tipoevaluacion')->where('condicion','=','1')->get();
        $tiposestudio=DB::table('tipoestudio')->where('condicion','=','1')->get();
        $documentos=null;
        $estudio=null;
        $proyecto=null;
        return view("admin.evaluacion.index",["proyectos"=>$proyectos,"proyecto"=>$proyecto,"estudios"=>$estudios,"documentos"=>$documentos,"query"=>$query,"departamentos"=>$departamentos,"estudio"=>$estudio,"entidades"=>$entidades,"tiposestudio"=>$tiposestudio,"tiposevaluacion"=>$tiposevaluacion]);
    }

}

  public function store(Request $request){
       $idestudio=$request->get('estudio');
        $idproyecto=$request->get('proyecto');
        $query=trim($request->get('searchText'));
        $proyectos=DB::table('proyecto')->where('condicion','=','1')->get();
        $estudios=DB::table('estudio')->where('condicion','=','1')->get();
        $entidades=DB::table('entidad')->where('condicion','=','1')->get();
        $tiposevaluacion=DB::table('tipoevaluacion')->where('condicion','=','1')->get();
        $tiposestudio=DB::table('tipoestudio')->where('condicion','=','1')->get();

    if($idproyecto!=""){

        $proyecto=Proyecto::findOrFail($idproyecto);
        if($idestudio!=""){
        $estudio=Estudio::findOrFail($idestudio);
        $documentos=DB::table('documentoestudio as d')->join('documento as do','do.iddocumento','=','d.iddocumento')
        ->select('d.iddocumentoestudio','d.descdocumentoestudio','d.urldocumentoestudio','d.created_at','d.idestudio','do.nombredocumento as tipodocumento')->where('d.condicion','=','1')->where('d.idestudio','=',$idestudio)->orderBy('d.iddocumentoestudio','desc')->get();
          }
          else{
        $estudio=null;
        $documentos=null;
          }
     }
    else{
        $proyecto=null;
        $estudio=null;
        $documentos=null;
        
    }
    return view("admin.evaluacion.index",["proyectos"=>$proyectos,"proyecto"=>$proyecto,"estudio"=>$estudio,"estudios"=>$estudios,"documentos"=>$documentos,"query"=>$query,"entidades"=>$entidades,"tiposestudio"=>$tiposestudio,"tiposevaluacion"=>$tiposevaluacion]);
    }

      public function destroy($iddepartamento){
        $departamento=departamento::findOrFail($iddepartamento);
        $departamento->condicion='0';
        $departamento->update();
        return Redirect::to('admin/departamento');
    }

    function listar(Request $request)
    {
     
     $select = $request->get('select'); //proyecto
     $value = $request->get('value');  //valor
     $dependent = $request->get('dependent'); //estudio
     $id='id'.$select;
     $iddependent='id'.$dependent;
     $nombre='nombre'.$dependent;

     $data = DB::table($select)
     ->join($dependent, $dependent.'.'.$id,'=',$select.'.'.$id)
     ->select($dependent.'.'.$iddependent, $dependent.'.'.$nombre)
       ->where($dependent.'.'.$id, $value)
       ->get();
     $output = '<option value="">Seleccione '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$iddependent.'">'.$row->$nombre.'</option>';
     }
     echo $output;
    }
    function listarall(Request $request)
    {
     
     $select = $request->get('select'); // proyecto
     $value = $request->get('value');  //valor
     $ta = $request->get('ta'); //tproyecto

     if($select=='proyecto'){
     $proyectos=DB::table('proyecto as p')->join('entidad as e','p.identidad','=','e.identidad')
        ->select('p.idproyecto','p.descripcionproyecto','p.objetivoproyecto','p.beneficiariosproyecto','e.nombreentidad as entidad')->where('p.idproyecto','=',$value)->where('p.condicion','=','1')->get();
     foreach($proyectos as $pro)
     {
      $output = '<label>Descripción: </label> '.$pro->descripcionproyecto.'<br>';
      $output .= '<label>Objetivo: </label> '.$pro->objetivoproyecto.'<br>';
      $output .= '<label>Beneficiarios: </label> '.$pro->beneficiariosproyecto.'<br>';
       $output .= '<label>Entidad: </label> '.$pro->entidad.'<br>';
     }
     }
     if($select=='estudio'){
     $estudios=DB::table('estudio as e')->join('tipoevaluacion as te','e.idtipoevaluacion','=','te.idtipoevaluacion')->join('tipoestudio as tes','e.idtipoestudio','=','tes.idtipoestudio')
        ->select('e.idestudio','e.descripcionestudio','te.nombretipoevaluacion as tipoevaluacion','tes.nombretipoestudio as tipoestudio')->where('e.idestudio','=',$value)->where('e.condicion','=','1')->get();
     foreach($estudios as $est)
     {
      $output = '<label>Descripción: </label> '.$est->descripcionestudio.'<br>';
      $output .= '<label>Tipo evaluacion: </label> '.$est->tipoevaluacion.'<br>';
      $output .= '<label>Tipo estudio: </label> '.$est->tipoestudio.'<br>';

     }
     }

     echo $output;
    }


}

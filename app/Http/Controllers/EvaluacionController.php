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
        $proyectos=DB::table('proyecto')->where('condicion','=','1')->get();
        $estudios=DB::table('estudio')->where('condicion','=','1')->get();
        $departamentos=DB::table('departamento')->where('condicion','=','1')->get();
        $entidades=DB::table('entidad')->where('condicion','=','1')->get();
        return view("admin.evaluacion.index",["proyectos"=>$proyectos,"estudios"=>$estudios,"departamentos"=>$departamentos,"entidades"=>$entidades]);
    }
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

     $proyectos=DB::table('proyecto as p')->where('idproyecto','=',$value)->where('condicion','=','1')->get();
     foreach($proyectos as $pro)
     {
      $output = '<label>Descripción: </label>'.$pro->descripcionproyecto.'<br>';
      $output .= '<label>Objetivo: </label>'.$pro->objetivoproyecto.'<br>';
      $output .= '<label>Beneficiarios: </label>'.$pro->beneficiariosproyecto.'<br>';

     }

     echo $output;
    }
/*
    function listar(Request $request)
    {
     
     $select = $request->get('select'); // departamento
     $value = $request->get('value');  //valor
     $dependent = $request->get('dependent'); //provincia
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
*/
}

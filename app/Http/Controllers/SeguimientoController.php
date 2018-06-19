<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Proyecto;
use resca\Estudio;
use resca\Departamento;
use resca\Provincia;
use resca\Distrito;
use resca\Entidad;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\SeguimientoFormRequest;
use DB;
use Response;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class SeguimientoController extends Controller
{
    public function __construct(){

    }
   
 public function index(Request $request){

      if($request){

        $proyectos=DB::table('proyecto')->where('condicion','=','1')->get();
        $estudios=DB::table('estudio')->where('condicion','=','1')->get();
        $departamentos=DB::table('departamento')->where('condicion','=','1')->get();
        $entidades=DB::table('entidad')->where('condicion','=','1')->get();
        return view("admin.seguimiento.index",["proyectos"=>$proyectos,"estudios"=>$estudios,"departamentos"=>$departamentos,"entidades"=>$entidades]);
    }
}

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

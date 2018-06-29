<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Proyecto;
use resca\Estudio;
use resca\Estadoestudio;
use resca\Departamento;
use resca\Provincia;
use resca\Distrito;
use resca\Delimitacionestudio;
use resca\Documentoestudio;
use resca\Actividad;
use resca\Entidad;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class EntidadesregistradasController extends Controller
{
    public function __construct(){

    }
   public function index($request){

      if($request){
            $actividades=DB::table('actividad')
            ->where('nombreactividad','LIKE','%'.$request.'%')
            ->where('condicion','=','1')
            ->paginate(999999);
            return view('entidadesr.index',["actividades"=>$actividades]);
        }
    }


   public function create(){

    }

    
    public function store(EstudioFormRequest $request){

    }

    public function show($id){
    	
    }
  

    public function destroy($id){

    }


}
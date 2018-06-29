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
            $entidades=DB::table('actividad as ac')
            ->join('entidad as en','en.idactividad','=','ac.idactividad')
            ->select('ac.nombreactividad','en.nombreentidad','en.rucentidad','en.direccionentidad','en.telefonoentidad','en.emailentidad','en.identidad')
            ->where('ac.nombreactividad','LIKE','%'.$request.'%')
            ->where('en.condicion','=','1')
            ->orderby('en.nombreentidad')
            ->paginate(999999);
            return view('entidadesr.index',["entidades"=>$entidades]);
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
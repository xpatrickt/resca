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

class EstudiosevaluadosController extends Controller
{
    public function __construct(){

    }
   public function index(Request $request){

      if($request){
            $estudios=DB::table('estudio')->where('condicion','=','1')->get();
            $documentoestudios=DB::table('estudio as e')
            ->join('documentoestudio as de','de.idestudio','=','e.idestudio')
            ->select('de.iddocumentoestudio','de.urldocumentoestudio','de.idestudio','de.iddocumento')
            ->where('e.condicion','=','1')
            ->where('de.condicion','=','1')
            ->orderBy('e.idestudio','desc')
            ->paginate(999999);
            return view('rca.index',["estudios"=>$estudios,"documentoestudios"=>$documentoestudios]);
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
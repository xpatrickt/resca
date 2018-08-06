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
use resca\Http\Requests\EstudioFormRequest;
use Illuminate\Support\Facades\Auth;
use DB;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ResultadoEvaluacionController extends Controller
{
    public function __construct(){

    }
   public function index(Request $request){

      if($request){

           // $idusuario = Auth::user()->id;
            $query=trim($request->get('searchText'));
            $estudios=DB::table('estudio as e')
            ->join('resolucion as r','r.idestudio','=','e.idestudio')
            ->select('e.nombreestudio as estudio','r.urlresolucion as resolucion','r.fecharesolucion as fecha')
            ->where('e.condicion','=','1')
            ->where('r.condicion','=','1')
            ->orderBy('e.idestudio','desc')
            ->paginate(999999);
            return view('resultado.index',["estudios"=>$estudios]);
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

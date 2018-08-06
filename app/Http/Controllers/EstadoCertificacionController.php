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
use DB;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class EstadoCertificacionController extends Controller
{
    public function __construct(){

    }
   public function index(Request $request){

      if($request){
            $query=trim($request->get('searchText'));
            $estudios=DB::table('estudio as e')
            ->join('proyecto as p','e.idproyecto','=','p.idproyecto')
            ->join('entidad as en','p.identidad','=','en.identidad')
            ->join('actividad as a','en.idactividad','=','a.idactividad')
            ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
            ->join('estado as est','es.idestado','=','est.idestado')
            ->join('tiposolicitud as ts','ts.idtiposolicitud','=','e.idtiposolicitud')
            ->select('e.idestudio as idestudio','e.codigosige as sige','a.nombreactividad as actividad','en.nombreentidad as entidad','p.nombreproyecto as proyecto','e.nombreestudio', 'est.nombreestado as estado','ts.nombretiposolicitud as solicitud')
            ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
            ->where('e.nombreestudio','LIKE','%'.$query.'%')
            ->where('e.condicion','=','1')
            ->where('ts.idtiposolicitud','=','1')
            ->where(function ($query2) {
            $query2->where('est.idestado', '3')
                  ->orWhere('est.idestado', '4')
                  ->orWhere('est.idestado', '5')
                  ->orWhere('est.idestado', '6')
                  ->orWhere('est.idestado', '8');
            })            
            ->orderBy('e.idestudio','desc')
            ->paginate(999999);
            return view('reportes.index',["estudios"=>$estudios,"searchText"=>$query]);
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

<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Proyecto;
use resca\Estudio;
use resca\Estadoestudio;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use DateTime;
use Illuminate\Support\Facades\Auth;

class SolicituduserController extends Controller
{
    public function __construct(){

    }
   public function index(Request $request){

     if($request){
            $query=trim($request->get('searchText'));
           
           //sacar rol de usuario
        $rol="";
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

         if($rol=='1'){
            $estudios=DB::table('estudio as e')
            ->join('proyecto as p','e.idproyecto','=','p.idproyecto')
            ->join('entidad as en','p.identidad','=','en.identidad')
            ->join('tipoestudio as te','e.idtipoestudio','=','te.idtipoestudio')
            ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
            ->join('estado as est','es.idestado','=','est.idestado')
            ->select('e.idestudio','te.nombretipoestudio','e.nombreestudio','e.codigosige','e.descripcionestudio','p.nombreproyecto as proyecto','en.nombreentidad as entidad', 'est.nombreestado as estado','es.created_at as fecha')
            ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
            ->where('e.nombreestudio','LIKE','%'.$query.'%')
            ->where('e.condicion','=','1')
            ->where(function ($query2) {
            $query2->where('es.idestado', '2')
                  ->orWhere('es.idestado', '9');
            })
            ->orderBy('e.idestudio','desc')
            ->get();
            return view('admin.solicituduser.index',["estudios"=>$estudios,"searchText"=>$query]);
          }
          else{
            $estudios=DB::table('estudio as e')
            ->join('proyecto as p','e.idproyecto','=','p.idproyecto')
            ->join('entidad as en','p.identidad','=','en.identidad')
            ->join('tipoestudio as te','e.idtipoestudio','=','te.idtipoestudio')
            ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
            ->join('estado as est','es.idestado','=','est.idestado')
            ->join('responsableproyecto as rp','p.idproyecto','=','rp.idproyecto')
            ->join('persona as pe','rp.idpersona','=','pe.idpersona')
            ->join('users as u','u.idpersona','=','pe.idpersona')
            ->select('e.idestudio','te.nombretipoestudio','e.nombreestudio','e.codigosige','e.descripcionestudio','p.nombreproyecto as proyecto','en.nombreentidad as entidad', 'est.nombreestado as estado','es.created_at as fecha')
            ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
            ->where('e.nombreestudio','LIKE','%'.$query.'%')
            ->where('e.condicion','=','1')
            ->where('u.id','=',$idusuario)
            ->where('p.condicion','=','1')
            ->where('pe.condicion','=','1')
            ->where('u.condicion','=','1')
            ->whereIn('es.idestado',['2','9'])
            ->orderBy('e.idestudio','desc')
            ->get();
            return view('admin.solicituduser.index',["estudios"=>$estudios,"searchText"=>$query]);
          }

        }
    }


}


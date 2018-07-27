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

class SeguimientouserController extends Controller
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
            ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
            ->join('estado as est','es.idestado','=','est.idestado')
            ->join('tipoestudio as ti','e.idtipoestudio','=','ti.idtipoestudio')
            ->select('e.idestudio','e.nombreestudio','e.descripcionestudio','p.nombreproyecto as proyecto','en.nombreentidad as entidad', 'est.nombreestado as estado','est.idestado','es.created_at as fecha',DB::raw('datediff(now(),es.created_at) as tiempo'),'ti.tiempoevaluacion','ti.tiemposubsanacion','ti.tiempocertificacion')
            ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
            ->where('e.nombreestudio','LIKE','%'.$query.'%')
            ->where('e.condicion','=','1')
            ->where('es.idestado','>','2')
            ->where('es.idestado','<','9')
            ->orderBy('e.idestudio','desc')
            ->get();
            return view('admin.seguimientouser.index',["estudios"=>$estudios,"searchText"=>$query]);
          }
          else{
            $estudios=DB::table('estudio as e')
            ->join('proyecto as p','e.idproyecto','=','p.idproyecto')
            ->join('entidad as en','p.identidad','=','en.identidad')
            ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
            ->join('estado as est','es.idestado','=','est.idestado')
            ->join('tipoestudio as ti','e.idtipoestudio','=','ti.idtipoestudio')
            ->join('responsableproyecto as rp','p.idproyecto','=','rp.idproyecto')
            ->join('persona as pe','rp.idpersona','=','pe.idpersona')
            ->join('users as u','u.idpersona','=','pe.idpersona')
            ->select('e.idestudio','e.nombreestudio','e.descripcionestudio','p.nombreproyecto as proyecto','en.nombreentidad as entidad', 'est.nombreestado as estado','est.idestado','es.created_at as fecha',DB::raw('datediff(now(),es.created_at) as tiempo'),'ti.tiempoevaluacion','ti.tiemposubsanacion','ti.tiempocertificacion')
            ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
            ->where('e.nombreestudio','LIKE','%'.$query.'%')
            ->where('e.condicion','=','1')
            ->where('es.idestado','>','2')
            ->where('es.idestado','<','9')
            ->where('u.id','=',$idusuario)
            ->where('p.condicion','=','1')
            ->where('pe.condicion','=','1')
            ->where('u.condicion','=','1')
            ->orderBy('e.idestudio','desc')
            ->get();
            return view('admin.seguimientouser.index',["estudios"=>$estudios,"searchText"=>$query]);
          }

        }
    }




    // LISTAR DOCUMENTOS  -------------

    function listardocumento(Request $request)
    {
     
      $est = $request->get('idest'); // estudio

    $data=DB::table('documentoestudio as d')
    ->join('documento as do','d.iddocumento','=','do.iddocumento')
        ->select('d.iddocumentoestudio','d.descdocumentoestudio','d.urldocumentoestudio','do.nombredocumento as tipodocumento','d.idestudio','d.created_at')
        ->where('d.idestudio','=',$est)
        ->where('d.condicion','=','1')
        ->orderBy('d.iddocumentoestudio','desc') ->get();
    
     $output = '<thead>
                  <tr>
                  <th>Documento</th>
                  <th>Tipo</th>
                  <th>Fecha</th>
                  <th></th>
                 </tr>
                </thead>
                <tbody>';
  
     foreach($data as $row)
     {
   $output .= '<tr><td>'.$row->descdocumentoestudio.'</td>
                 <td>'.$row->tipodocumento.'</td>
                 <td>'.$row->created_at.'</td>
                 <td><a  href="../admin'.$row->urldocumentoestudio.'"  target="_blank"><i class="fa fa-file-pdf-o"></i></a></td>
              </tr>';
     }
     $output .= '</tbody>';

          
     echo $output;
    }


}

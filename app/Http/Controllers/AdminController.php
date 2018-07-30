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

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        
       }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
      if($request){
            $query=trim($request->get('searchText'));
            $estudios=DB::table('estudio as e')
            ->join('proyecto as p','e.idproyecto','=','p.idproyecto')
            ->join('entidad as en','p.identidad','=','en.identidad')
            ->join('actividad as a','en.idactividad','=','a.idactividad')
            ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
            ->join('estado as est','es.idestado','=','est.idestado')
            ->select('a.nombreactividad as actividad','en.nombreentidad as entidad','p.nombreproyecto as proyecto','e.nombreestudio','e.descripcionestudio', 'est.nombreestado as estado')
            ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
            ->where('e.nombreestudio','LIKE','%'.$query.'%')
            ->where('e.condicion','=','1')
            ->orderBy('e.idestudio','desc')
            ->get();

            
            return view('admin.index',["estudios"=>$estudios,"searchText"=>$query]);
        }
    }

    public function mensaje()
    {
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
                ->select('e.idestudio','e.nombreestudio','e.descripcionestudio','en.nombreentidad as entidad', 'est.nombreestado as estado','est.idestado','es.created_at as fecha',DB::raw('count(e.idestudio) as numero'))
                ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
                ->where('e.condicion','=','1')
                ->where('es.idestado','=','2')
                ->orderBy('e.idestudio','desc')
                ->get();

                $output='<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">'.$estudios[0]->numero.'</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">Tienes '.$estudios[0]->numero.' Solicitud(es)</li>
                      <li>
                        <ul class="menu">';
                     foreach($estudios as $est)  
                        {
                        $output.='<li>
                            <a href="'.url ("admin/evaluacionestudio").'">
                              <div class="pull-left">
                                <img src="'.asset("adminlte/dist/img/resca1.jpg").'" class="img-circle" alt="User Image">
                              </div>
                              <h4>
                                '.$est->entidad.'
                              </h4>
                              <p>'.$est->nombreestudio.'</p>
                              <p><small><i class="fa fa-clock-o"></i>'.\Carbon\Carbon::parse($est->fecha)->format('d/m/Y H:i:s').'</small></p>
                            </a>
                          </li>';
                       }
                    $output.='</ul>
                      </li>
                      <li class="footer"><a href="'.url ("admin/evaluacionestudio").'">Gestionar solicitud de evaluación</a></li>
                    </ul>';
             }
             else{
                if($rol=='2'){

                  $estudios=DB::table('estudio as e')
                    ->join('proyecto as p','e.idproyecto','=','p.idproyecto')
                    ->join('entidad as en','p.identidad','=','en.identidad')
                    ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
                    ->join('responsableproyecto as rp','p.idproyecto','=','rp.idproyecto')
                    ->join('persona as pe','rp.idpersona','=','pe.idpersona')
                    ->join('users as u','u.idpersona','=','pe.idpersona')
                    ->select('e.idestudio','e.nombreestudio','en.nombreentidad as entidad','es.created_at as fecha','count(e.idestudio) as numero')
                    ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
                    ->where('e.nombreestudio','LIKE','%'.$query.'%')
                    ->where('e.condicion','=','1')
                    ->where('u.id','=',$idusuario)
                    ->where('p.condicion','=','1')
                    ->where('pe.condicion','=','1')
                    ->where('u.condicion','=','1')
                    ->whereIn('es.idestado','=','2')
                    ->orderBy('es.created_as','asc')
                    ->get();

                 $output='<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">'.$estudios[0]->numero.'</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">Tienes '.$estudios[0]->numero.' Solicitud(es)</li>
                      <li>
                        <ul class="menu">';
                     foreach($estudios as $est)  
                        {
                        $output.='<li>
                            <a href="'.url ("admin/evaluacionestudio").'">
                              <div class="pull-left">
                                <img src="'.asset("adminlte/dist/img/resca1.jpg").'" class="img-circle" alt="User Image">
                              </div>
                              <h4>
                                '.$est->entidad.'
                              </h4>
                              <p>'.$est->nombreestudio.'</p>
                              <p><small><i class="fa fa-clock-o"></i>'.\Carbon\Carbon::parse($est->fecha)->format('d/m/Y H:i:s').'</small></p>
                            </a>
                          </li>';
                       }
                    $output.='</ul>
                      </li>
                      <li class="footer"><a href="'.url ("admin/evaluacionestudio").'">Gestionar solicitud de evaluación</a></li>
                    </ul>';
                }
                else{
                    $estudios=DB::table('estudio as e')
                    ->join('proyecto as p','e.idproyecto','=','p.idproyecto')
                    ->join('entidad as en','p.identidad','=','en.identidad')
                    ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
                    ->join('responsableproyecto as rp','p.idproyecto','=','rp.idproyecto')
                    ->join('persona as pe','rp.idpersona','=','pe.idpersona')
                    ->join('users as u','u.idpersona','=','pe.idpersona')
                    ->select('e.idestudio','e.nombreestudio','en.nombreentidad as entidad','es.created_at as fecha','count(e.idestudio) as numero')
                    ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
                    ->where('e.nombreestudio','LIKE','%'.$query.'%')
                    ->where('e.condicion','=','1')
                    ->where('u.id','=',$idusuario)
                    ->where('p.condicion','=','1')
                    ->where('pe.condicion','=','1')
                    ->where('u.condicion','=','1')
                    ->whereIn('es.idestado','=','2')
                    ->orderBy('es.created_as','asc')
                    ->get();
                 $output='<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">'.$estudios[0]->numero.'</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">Tienes '.$estudios[0]->numero.' Solicitud(es)</li>
                      <li>
                        <ul class="menu">';
                     foreach($estudios as $est)  
                        {
                        $output.='<li>
                            <a href="'.url ("admin/evaluacionestudio").'">
                              <div class="pull-left">
                                <img src="'.asset("adminlte/dist/img/resca1.jpg").'" class="img-circle" alt="User Image">
                              </div>
                              <h4>
                                '.$est->entidad.'
                              </h4>
                              <p>'.$est->nombreestudio.'</p>
                              <p><small><i class="fa fa-clock-o"></i>'.\Carbon\Carbon::parse($est->fecha)->format('d/m/Y H:i:s').'</small></p>
                            </a>
                          </li>';
                       }
                    $output.='</ul>
                      </li>
                      <li class="footer"><a href="'.url ("admin/evaluacionestudio").'">Gestionar solicitud de evaluación</a></li>
                    </ul>';
                }
             }
             
           
           echo $output;
    }

    public function alerta()
    {
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
                $estudiosaprobado=DB::table('estudio as e')
                ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
                ->select('e.idestudio','es.idestado','es.created_at as fecha',DB::raw('count(e.idestudio) as numero'))
                ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
                ->where('e.condicion','=','1')
                ->where('es.idestado','=','5')
                ->orderBy('e.idestudio','desc')
                ->get();
                $estudiosdesaprobado=DB::table('estudio as e')
                ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
                ->select('e.idestudio','es.idestado','es.created_at as fecha',DB::raw('count(e.idestudio) as numero'))
                ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
                ->where('e.condicion','=','1')
                ->where('es.idestado','=','6')
                ->orderBy('e.idestudio','desc')
                ->get();
                $numerototal=$estudiosaprobado[0]->numero+$estudiosdesaprobado[0]->numero;
                $output='<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">'.$numerototal.'</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes '.$numerototal.' Registro(s) Ambiental(es)</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i>'.$estudiosaprobado[0]->numero.' Registros ambientales Aprobados
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i>'.$estudiosdesaprobado[0]->numero.' Registros ambientales Desaprobados
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="'.url ("admin/seguimientouser").'">Verificar estado de registro ambiental</a></li>
            </ul>';
             }
             else{
                if($rol=='2'){
                  $numero='2';
                }
                else{
                  $numero='3';
                }
             }
             
           
           echo $output;
    }

    public function porcentaje()
    {
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
                ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
                ->join('estado as est','es.idestado','=','est.idestado')
                ->join('tipoestudio as ti','e.idtipoestudio','=','ti.idtipoestudio')
                ->select('e.idestudio','e.nombreestudio','e.descripcionestudio', 'est.nombreestado as estado','est.idestado','es.created_at as fecha',DB::raw('count(e.idestudio) as numero'),DB::raw('datediff(now(),es.created_at) as tiempo'),'ti.tiempocertificacion')
                ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
                ->where('e.condicion','=','1')
                ->whereIn('es.idestado',['5','6'])
                ->orderBy('fecha','asc')
                ->get();
                $output='<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">'.$estudios[0]->numero.'</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes '.$estudios[0]->numero.' registros a certificar</li>
              <li>
                <ul class="menu">';
                foreach($estudios as $est)  
                 {
                  $porc=($est->tiempo*100/$est->tiempocertificacion);
                  $output.='<li>
                    <a href="#">
                      <h3>
                        '.$est->nombreestudio.'
                      </h3>
                      <p><small class="pull-right">'.$est->tiempo.'/'.$est->tiempocertificacion.' días</small></p>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>';
                }
              $output.='</ul>
              </li>
              <li class="footer">
                <a href="#">Certificar registro ambiental</a>
              </li>
            </ul>';
             }
             else{
                if($rol=='2'){
                  $numero='2';
                }
                else{
                  $numero='3';
                }
             }
             
           
           echo $output;
    }

}

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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use resca\Http\Requests\EstudioFormRequest;
use resca\Http\Requests\RegistrodelimitacionFormRequest;
use resca\Http\Requests\RegistrodocumentoFormRequest;
use DB;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use DateTime;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function __construct(){

    }
   public function index(Request $request){

      if($request){
            $query=trim($request->get('searchText'));
            $delimitacionesestudio=DB::table('delimitacionestudio')->where('condicion','=','1')->get();
           $documentosestudio=DB::table('documentoestudio')->where('condicion','=','1')->get();
           $documentos=DB::table('documento')->where('condicion','=','1')->get();
           $departamentos=DB::table('departamento')->where('condicion','=','1')->get();
           $provincias=DB::table('provincia')->where('iddepartamento','=','030000')->where('condicion','=','1')->get();
            $estudios=DB::table('estudio as e')
            ->join('proyecto as p','e.idproyecto','=','p.idproyecto')
            ->join('entidad as en','p.identidad','=','en.identidad')
            ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
            ->join('estado as est','es.idestado','=','est.idestado')
            ->select('e.idestudio','e.nombreestudio','e.descripcionestudio','p.nombreproyecto as proyecto','en.nombreentidad as entidad', 'est.nombreestado as estado')
            ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
            ->where('e.nombreestudio','LIKE','%'.$query.'%')
            ->where('e.condicion','=','1')
            ->where('es.idestado','=','1')
            ->orderBy('e.idestudio','desc')
            ->paginate(999999);
            return view('admin.registro.index',["estudios"=>$estudios,"delimitacionesestudio"=>$delimitacionesestudio,"documentosestudio"=>$documentosestudio,"documentos"=>$documentos,"departamentos"=>$departamentos,"provincias"=>$provincias,"searchText"=>$query]);
        }
    }




   public function create(){

                   //LISTAR PROYECTOS 
        //sacar rol de usuario
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
      //

       if($rol=='1'){
           $proyectos=DB::table('proyecto')
           ->where('condicion','=','1')->get();
        }
        else{
           $proyectos=DB::table('proyecto as p')
            ->join('responsableproyecto as rp','p.idproyecto','=','rp.idproyecto')
            ->join('persona as pe','rp.idpersona','=','pe.idpersona')
           ->join('users as u','u.idpersona','=','pe.idpersona')
           ->select('p.idproyecto','p.nombreproyecto','p.descripcionproyecto','p.objetivoproyecto','p.beneficiariosproyecto')
           ->where('u.id','=',$idusuario)
           ->where('p.condicion','=','1')
           ->where('pe.condicion','=','1')
           ->where('u.condicion','=','1')
          ->distinct()
           ->get();
       }
       //END LISTAR PROYECTOS
        $tiposevaluacion=DB::table('tipoevaluacion')->where('condicion','=','1')->get();
        $tiposestudio=DB::table('tipoestudio')->where('condicion','=','1')->get();
        
        return view("admin.registro.create",["tiposevaluacion"=>$tiposevaluacion,"tiposestudio"=>$tiposestudio,"proyectos"=>$proyectos]);
    }



    function listar(Request $request)
    {
     
     $select = $request->get('select'); // departamento
     $value = $request->get('value');  //valor
     $dependent = $request->get('dependent'); //provincia
     $id='id'.$select;
     $iddependent='id'.$dependent;
     $nombre='nombre'.$dependent;

     $data = DB::table('$select')
     ->join($dependent, $dependent.'.'.$id,'=',$select.'.'.$id)
     ->select($dependent.'.'.$iddependent, $dependent.'.'.$nombre)
       ->where($dependent.'.'.$id, $value)->where($select.'.condicion','=','1')
       ->get();
     $output = '<option value="">Seleccione '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$iddependent.'">'.$row->$nombre.'</option>';
     }
     echo $output;
    }

// LISTAR DELIMITACION -------------

    function listardelimitacion(Request $request)
    {
     
      $est = $request->get('idest'); // estudio

    $data=DB::table('delimitacionestudio as d')
    ->join('distrito as di','d.iddistrito','=','di.iddistrito')
        ->join('provincia as p','di.idprovincia','=','p.idprovincia')
        ->select('d.iddelimitacionestudio','d.descripciondelimitacion','p.nombreprovincia as provincia','di.nombredistrito as distrito','d.coordenadasx', 'd.coordenadasy')
        ->where('d.idestudio','=',$est)->where('d.condicion','=','1')
        ->orderBy('d.iddelimitacionestudio','desc') ->get();
  
     $output = '<thead>
                  <tr>
                  <th>Provincia</th>
                  <th>Distrito</th>
                  <th>Delimitación</th>
                 <th>Coordenadas</th>
                 </tr>
                </thead>
                <tbody>';
     foreach($data as $row)  
     {
   $output .= '<tr><td>'.$row->provincia.'</td>
                   <td>'.$row->distrito.'</td>
                   <td>'.$row->descripciondelimitacion.'</td> 
                   <td>x: '.$row->coordenadasx.' y: '. $row->coordenadasy.'</td>
                </tr>';
       }
      $output .= '</tbody>';
     echo $output;
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

 
//------------------------------------------------------
    
    public function store(EstudioFormRequest $request){
    	$estudio=new Estudio;
    	$estudio->nombreestudio=$request->get('nombre');
    	$estudio->descripcionestudio=$request->get('descripcion');
      $estudio->condicion='1';
      $estudio->idproyecto=$request->get('idproyecto');
      $estudio->idtipoevaluacion=$request->get('idtipoevaluacion');
    	$estudio->idtipoestudio=$request->get('idtipoestudio');
   		$estudio->save();

        $est=DB::table('estudio')->where('nombreestudio','=',$request->get('nombre'))->where('condicion','=','1')
        ->orderBy('idestudio', 'desc') ->limit(1)->get();

       foreach($est as $e)
       {
        $estadoestudio=new Estadoestudio;
        $estadoestudio->idestudio=$e->idestudio;
        $estadoestudio->idestado='1';
        $estadoestudio->condicion='1';
        $estadoestudio->save();
       }

   	  return Redirect::to('admin/registro');
    
    }

    // ENVIAR ESTUDIO A EVALUACION

    public function destroy($idestudio){
       $estadoestudio=new Estadoestudio;
        $estadoestudio->idestudio=$idestudio;
        $estadoestudio->idestado='2';
        $estadoestudio->condicion='1';
        $estadoestudio->save();
        return Redirect::to('admin/registro');

    }

  // AGREGAR Y LISTAS DELIMITACION Y DOCUMENTOS
  public function show($idestudio){
    $tipodocumento=DB::table('documento')->where('condicion','=','1')->get();
    $provincias=DB::table('provincia')->where('iddepartamento','=','030000')->where('condicion','=','1')->get();
    $departamentos=DB::table('departamento')->where('condicion','=','1')->get();
    $delimitaciones=DB::table('delimitacionestudio as d')
    ->join('distrito as di','d.iddistrito','=','di.iddistrito')
        ->join('provincia as p','di.idprovincia','=','p.idprovincia')
        ->select('d.iddelimitacionestudio','d.descripciondelimitacion','p.nombreprovincia as provincia','di.nombredistrito as distrito','d.coordenadasx', 'd.coordenadasy')
        ->where('d.idestudio','=',$idestudio)
        ->where('d.condicion','=','1')
        ->orderBy('d.iddelimitacionestudio','desc') ->get();
    $documentos=DB::table('documentoestudio as d')
    ->join('documento as do','d.iddocumento','=','do.iddocumento')
        ->select('d.iddocumentoestudio','d.descdocumentoestudio','d.urldocumentoestudio','do.nombredocumento as tipodocumento','d.idestudio','d.created_at')
        ->where('d.idestudio','=',$idestudio)
        ->where('d.condicion','=','1')
        ->orderBy('d.iddocumentoestudio','desc') ->get();
      return view("admin.registro.show",["estudio"=>Estudio::findOrFail($idestudio),"delimitaciones"=>$delimitaciones,"documentos"=>$documentos,"departamentos"=>$departamentos,"provincias"=>$provincias,"tipodocumento"=>$tipodocumento]);
    }
 
  // GUARDAR DELIMITACION ESTUDIO
     public function edit(RegistrodelimitacionFormRequest $request){
      $delimitacion=new Delimitacionestudio;
      $delimitacion->descripciondelimitacion=$request->get('descripcion');
      $delimitacion->coordenadasx=$request->get('lat');
      $delimitacion->coordenadasy=$request->get('lng');
      $delimitacion->condicion='1';
      $delimitacion->iddistrito=$request->get('distrito');
      $delimitacion->idestudio=$request->get('idestudio1');
      $delimitacion->save();
      return Redirect::to('admin/registrodetalle/'.$request->get('idestudio1'));
    }

  // GUARDAR DOCUMENTOS ESTUDIO
    public function update(RegistrodocumentoFormRequest $request,$idestudio){
      $documento=new Documentoestudio;
      $documento->descdocumentoestudio=$request->get('descripciondocumento');
      if(Input::hasFile('documento')){
            $file=Input::file('documento');
            $nombred=date("dmyHis"); 
            $file->move(public_path().'/admin/documentos/estudio/',$nombred.'.pdf');
            $documento->urldocumentoestudio='/documentos/estudio/'.$nombred.'.pdf';
        }
      $documento->condicion='1';
      $documento->idestudio=$request->get('idestudio2');
      $documento->iddocumento=$request->get('tipodocumento');
      $documento->save();
      return Redirect::to('admin/registrodetalle/'.$request->get('idestudio2'));     
    }

}

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
use DB;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Collection;

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
            ->orderBy('e.idestudio','desc')
            ->paginate(999999);
            return view('admin.registro.index',["estudios"=>$estudios,"delimitacionesestudio"=>$delimitacionesestudio,"documentosestudio"=>$documentosestudio,"documentos"=>$documentos,"departamentos"=>$departamentos,"provincias"=>$provincias,"searchText"=>$query]);
        }
    }




   public function create(){
        $proyectos=DB::table('proyecto')->where('condicion','=','1')->get();
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

//DELIMITACION -------------
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
                  <th>Descripcion</th>
                 <th>Coordenadas</th>
                  <th></th>
                 </tr>
                </thead>
                <tbody>';
     foreach($data as $row)  
     {
   $output .= '<tr><td>'.$row->provincia.'</td><td>'.$row->distrito.'</td><td>'.$row->descripciondelimitacion.
              '</td> <td>x:'.$row->coordenadasx.' y:'. $row->coordenadasy.'</td><td>
                 <a  href="" onclick="deletedelimitacion();"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
                </tr>';
       }
      $output .= '</tbody>';
     echo $output;
    }

     function agregardelimitacion(Request $request)
    {
     
     $delimitacion=new Delimitacionestudio;
      $delimitacion->descripciondelimitacion=$request->get('descripcion');
      $delimitacion->coordenadasx=$request->get('lat');
      $delimitacion->coordenadasy=$request->get('lng');
      $delimitacion->condicion='1';
      $delimitacion->iddistrito=$request->get('distrito');
      $delimitacion->idestudio=$request->get('estudiotext');
      $delimitacion->save();

     $data=DB::table('delimitacionestudio as d')
    ->join('distrito as di','d.iddistrito','=','di.iddistrito')
        ->join('provincia as p','di.idprovincia','=','p.idprovincia')
        ->select('d.iddelimitacionestudio','d.descripciondelimitacion','p.nombreprovincia as provincia','di.nombredistrito as distrito','d.coordenadasx', 'd.coordenadasy')
        ->where('d.idestudio','=',$request->get('estudiotext'))
        ->where('d.condicion','=','1')
        ->orderBy('d.iddelimitacionestudio','desc') ->get();
  
     $output = '<thead>
                  <tr>
                  <th>Provincia</th>
                  <th>Distrito</th>
                  <th>Descripcion</th>
                  <th>Coordenadas</th>
                  <th></th>
                 </tr>
                </thead>
                <tbody>';
     foreach($data as $row)
     {
  $output .= '<tr><td>'.$row->provincia.'</td><td>'.$row->distrito.'</td><td>'.$row->descripciondelimitacion.
              '</td> <td>x:'.$row->coordenadasx.' y:'. $row->coordenadasy.'</td><td>
                 <a  href="" onclick="deletedelimitacion();"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
                </tr>';
     }
     $output .= '</tbody>';
     echo $output;
     
    }

//DOCUMENTOS *********************************************************************************************************

function listardocumento(Request $request)
    {
     
      $est = $request->get('idest'); // estudio

    $data=DB::table('documentoestudio as d')
    ->join('documento as do','d.iddocumento','=','do.iddocumento')
        ->select('d.iddocumentoestudio','d.descdocumentoestudio','d.urldocumentoestudio','do.nombredocumento as tipodocumento','d.idestudio')
        ->where('d.idestudio','=',$est)
        ->where('d.condicion','=','1')
        ->orderBy('d.iddocumentoestudio','desc') ->get();
    
     $output = '<tbody>
                <tr>
                  <td>';
  
     foreach($data as $row)
     {
   $output .= '<a class="btn btn-app">
          <i class="fa fa-file-pdf-o"></i>'.$row->descdocumentoestudio.'</a>';
     }
     $output .= '</td>
                </tr>
                </tbody>';

          
     echo $output;
    }

     function agregardocumento(Request $request)
    {

     
     $documento=new Documentoestudio;
      $documento->descdocumentoestudio=$request->get('descripcion');
       $documento->urldocumentoestudio=$request->get('url');
      /*if(Input::hasFile('url')){
            $file=Input::file('url');
            $nombred=date("dmyHis"); 
            $file->move(public_path().'/documentos/estudio/',$nombred.'.pdf');
       $documento->urldocumentoestudio='/documentos/estudio/'.$nombred.'.pdf';
        }*/

         /* $file = $request->get('url');
          $nombred=date("dmyHis"); 
          $file->move(public_path().'/documentos/estudio/',$nombred.'.pdf');
       $documento->urldocumentoestudio='/documentos/estudio/'.$nombred.$file.'.pdf';*/

       /*
          $name = $file->getClientOriginalExtension();
          $url['filePath'] = $name;
          $file->move(public_path().'/documentos/estudio/', $name);
         $documento->urldocumentoestudio='/documentos/estudio/'.$name;*/
 


     $documento->condicion='1';
      $documento->idestudio=$request->get('estudiotext');
      $documento->iddocumento=$request->get('tipodocumento');
      $documento->save();

     $data=DB::table('documentoestudio as d')
    ->join('documento as do','d.iddocumento','=','do.iddocumento')
        ->select('d.iddocumentoestudio','d.descdocumentoestudio','d.urldocumentoestudio','do.nombredocumento as tipodocumento','d.idestudio')
        ->where('d.idestudio','=',$request->get('estudiotext'))
        ->where('d.condicion','=','1')
        ->orderBy('d.iddocumentoestudio','desc') ->get();
  
      $output = '<tbody>
                <tr>
                  <td>';
     foreach($data as $row)
     {
   $output .= '<a class="btn btn-app">
          <i class="fa fa-file-pdf-o"></i>'.$row->descdocumentoestudio.'</a>';
     }
     $output .= '</td>
                </tr>
                </tbody>';
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

    public function show($idestudio){
    	return view("admin.registro.show",["estudio"=>Estudio::findOrFail($idestudio)]);
    }
  

  /* public function edit($idestudio){
            $proyecto=Proyecto::findOrFail($idproyecto);
        $catalogos=DB::table('catalogo')->where('condicion','=','1')->get();
        $distritos=DB::table('distrito')->where('condicion','=','1')->get();
        $provincias=DB::table('provincia')->where('condicion','=','1')->get();
        $departamentos=DB::table('departamento')->where('condicion','=','1')->get();
        $entidades=DB::table('entidad')->where('condicion','=','1')->get();
        return view("admin.proyecto.edit",["proyecto"=>$proyecto,"catalogos"=>$catalogos,"distritos"=>$distritos ,"provincias"=>$provincias,"departamentos"=>$departamentos,"entidades"=>$entidades]);
    }*/

    public function destroy($idestudio){
       $estadoestudio=new Estadoestudio;
        $estadoestudio->idestudio=$idestudio;
        $estadoestudio->idestado='2';
        $estadoestudio->condicion='1';
        $estadoestudio->save();
    }

}

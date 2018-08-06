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

class EstadoEvaluacionController extends Controller
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
            ->where('ts.idtiposolicitud','=','2')
            ->where(function ($query2) {
            $query2->where('est.idestado', '3')
                  ->orWhere('est.idestado', '4')
                  ->orWhere('est.idestado', '5')
                  ->orWhere('est.idestado', '6')
                  ->orWhere('est.idestado', '10');
            })            
            ->orderBy('e.idestudio','desc')
            ->get();
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
                  <th>Fecha de Registro</th>
                  <th> </th>
                 </tr>
                </thead>
                <tbody>';
  
     foreach($data as $row)
     {
   $output .= '<tr><td>'.$row->descdocumentoestudio.'</td>
                 <td>'.$row->tipodocumento.'</td>
                 <td>'.\Carbon\Carbon::parse($row->created_at)->format('d/m/Y').'</td>
                 <td><a  href="../public/admin'.$row->urldocumentoestudio.'"  target="_blank"><i class="fa fa-file-pdf-o"></i></a></td>
              </tr>';
     }
     $output .= '</tbody>';

          
     echo $output;
    }
}

<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Persona;
use resca\Estudio;
use resca\Evaluacionestudio;
use resca\Estadoestudio;
use resca\Certificacion;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\CertificacionFormRequest;
use Illuminate\Support\Facades\Input;
use DB;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use DateTime;


class CertificacionController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){

      if($request){
            $query=trim($request->get('searchText'));
            $estudios=DB::table('estudio as e')
            ->join('proyecto as p','p.idproyecto','=','e.idproyecto')
            ->join('entidad as en','p.identidad','=','en.identidad')
            ->join('estadoestudio as es','e.idestudio','=','es.idestudio')
            ->join('estado as est','es.idestado','=','est.idestado')
            ->select('e.idestudio','e.nombreestudio','e.descripcionestudio','p.nombreproyecto as proyecto','en.nombreentidad as entidad','est.nombreestado as estado','es.idestudio')
            ->whereRaw('idestadoestudio IN (select MAX(idestadoestudio) FROM estadoestudio GROUP BY idestudio)')
            ->where('e.nombreestudio','LIKE','%'.$query.'%')
            ->where('e.condicion','=','1')
         /*   ->where('es.idestado','=','5')*/
            ->where(function ($query2) {
            $query2->where('es.idestado', '5')
                  ->orWhere('es.idestado', '6');
            })
           // ->groupBy('es.idestudio','')
       //  ->having('es.idestudio','<','3')
            ->orderBy('es.idestudio','desc')
            ->paginate(999999);
            return view('admin.certificacion.index',["estudios"=>$estudios,"searchText"=>$query]);
        }
    }

   public function edit($idestudio){
         $estudio=Estudio::findOrFail($idestudio);
        return view("admin.certificacion.edit",["estudio"=>$estudio]);
    }

    public function update(CertificacionFormRequest $request,$idresolucion){
    	$resolucion=new Certificacion;
        $resolucion->nombreresolucion=$request->get('nombre');
        $resolucion->descripcionresolucion=$request->get('descripcion');

        $fecha = DateTime::createFromFormat('d/m/Y',$request->get('fecha'));
        $resolucion->fecharesolucion=$fecha->format('Y-m-d');

       // $resolucion->fecharesolucion=date('Y-m-d', strtotime($request->get('fecha')));
      //  $fecha = Carbon::createFromFormat('Y-m-d', $request->input('fecha'))->format('d-m-Y');
      //  $resolucion->fecharesolucion=date('d-m-Y', strtotime(str_replace('-', '/', $request['fecha'])));
       // $resolucion->fecharesolucion= $request->get('fecha');
       if(Input::hasFile('documento')){
            $file=Input::file('documento');
            $nombred=date("dmyHis"); 
            $file->move(public_path().'/admin/documentos/resolucion/',$nombred.'.pdf');
            $resolucion->urlresolucion='/admin/documentos/resolucion/'.$nombred.'.pdf';
        }
        $resolucion->idestudio=$request->get('idestudio');
    	$resolucion->save();
        $estadoestudio=new Estadoestudio;
        $estadoestudio->idestudio=$request->get('idestudio');
        $estadoestudio->idestado=$request->get('idestado');
        $estadoestudio->save();
    	return Redirect::to('admin/certificacion'); 	
    }

    public function show($idresolucion){
        return view("admin.certificacion.show",["certificacion"=>certificacion::findOrFail($idresolucion)]);
    }




}

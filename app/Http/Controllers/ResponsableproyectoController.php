<?php
namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Persona;
use resca\Estudio;
use resca\Evaluacionestudio;
use resca\Estadoestudio;
use resca\Proyecto;
use resca\User;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\ResponsableproyectoFormRequest;
use DB;

class ResponsableproyectoController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){

      if($request){
            $query=trim($request->get('searchText'));
            $proyectos=DB::table('entidad as e')
            ->join('proyecto as p','p.identidad','=','a.identidad')
            ->leftjoin('representante as r','r.identidad','=','e.identidad')
            ->leftjoin('persona as p','r.idpersona','=','p.idpersona')
            ->select('e.identidad','e.nombreentidad','e.direccionentidad','e.telefonoentidad','e.emailentidad','e.rucentidad','a.nombreactividad as actividad',DB::raw('CONCAT(p.nombrepersona," ",p.apellidospersona) AS representante'))
            ->where('e.nombreestudio','LIKE','%'.$query.'%')
            ->where('e.condicion','=','1')
            ->orderBy('es.idestudio','desc')
            ->paginate(999999);
            return view('admin.responsableproyecto.index',["proyectos"=>$proyectos,"searchText"=>$query]);
        }
    }


   public function edit($idestudio){
         $estudio=Estudio::findOrFail($idestudio);
        $personas=DB::table('persona')->select(DB::raw('CONCAT(persona.nombrepersona," ",persona.apellidospersona) AS nombres'),'persona.idpersona')->where('condicion','=','1')->get();
        return view("admin.responsableproyecto.edit",["estudio"=>$estudio,"personas"=>$personas]);
    }

    public function update(EvaluacionestudioFormRequest $request,$idevaluacionestudio){
    	$responsableproyecto=new Evaluacionestudio;
        $responsableproyecto->idestudio=$request->get('idestudio');
        $responsableproyecto->idpersona=$request->get('idpersona');
    	$responsableproyecto->save();
        /*$estadoestudio=new Estadoestudio;
        $estadoestudio->idestudio=$request->get('idestudio');
        $estadoestudio->idestado=$request->get('idestado');
        $estadoestudio->save();*/
    	return Redirect::to('admin/responsableproyecto'); 	
    }

    public function show($idevaluacionestudio){
        return view("admin.responsableproyecto.show",["responsableproyecto"=>responsableproyecto::findOrFail($idevaluacionestudio)]);
    }




}

<?php
namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Persona;
use resca\Estudio;
use resca\Evaluacionestudio;
use resca\Estadoestudio;
use resca\Proyecto;
use resca\Responsableproyecto;
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

            $proyectos=DB::table('proyecto as p')
            ->leftjoin('responsableproyecto as rp','p.idproyecto','=','rp.idproyecto')
            ->leftjoin('persona as pe','rp.idpersona','=','pe.idpersona')
            ->select('p.idproyecto','p.nombreproyecto',DB::raw('CONCAT(pe.nombrepersona," ",pe.apellidospersona) AS responsable'))
            ->where('p.condicion','=','1')
            ->orderBy('p.idproyecto','desc')
            ->paginate(999999);
            return view('admin.responsableproyecto.index',["proyectos"=>$proyectos]);
        }
    }


   public function edit($idproyecto){
         $proyecto=Proyecto::findOrFail($idproyecto);
        $personas=DB::table('persona')->select(DB::raw('CONCAT(persona.nombrepersona," ",persona.apellidospersona) AS nombres'),'persona.idpersona')->where('condicion','=','1')->get();
        return view("admin.responsableproyecto.edit",["proyecto"=>$proyecto,"personas"=>$personas]);
    }

    public function update(ResponsableproyectoFormRequest $request,$idresponsableproyecto){
    	$responsableproyecto=new Responsableproyecto;
        $responsableproyecto->idproyecto=$request->get('idproyecto');
        $responsableproyecto->idpersona=$request->get('idpersona');
    	$responsableproyecto->save();
    	return Redirect::to('admin/responsableproyecto'); 	
    }

    public function show($idresponsableproyecto){
        return view("admin.responsableproyecto.show",["responsableproyecto"=>responsableproyecto::findOrFail($idresponsableproyecto)]);
    }




}

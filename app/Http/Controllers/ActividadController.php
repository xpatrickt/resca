<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Actividad;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\ActividadFormRequest;
use DB;

class ActividadController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$actividades=DB::table('actividad')->where('nombreactividad','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('idactividad','desc')
    		->paginate(100);
    		return view('admin.actividad.index',["actividades"=>$actividades,"searchText"=>$query]);
    	   
        }
    }

    public function create(){
    	return view("admin.actividad.create");
    }
    public function store(actividadFormRequest $request){
    	$actividad=new Actividad;
        $actividad->nombreactividad=$request->get('nombre');
       	$actividad->descripcionactividad=$request->get('descripcion');
    	$actividad->condicion='1';
   		$actividad->save();
   		return Redirect::to('admin/actividad');
    }

    public function show($idactividad){
    	return view("admin.actividad.show",["actividad"=>actividad::findOrFail($idactividad)]);
    }
    public function edit($idactividad){
    	return view("admin.actividad.edit",["actividad"=>actividad::findOrFail($idactividad)]);
    }
    public function update(actividadFormRequest $request,$idactividad){
    	$actividad=actividad::findOrFail($idactividad);
    	$actividad->nombreactividad=$request->get('nombre');
    	$actividad->descripcionactividad=$request->get('descripcion');
    	$actividad->update();
    	return Redirect::to('admin/actividad');    	
    }
    public function destroy($idactividad){
    	$actividad=actividad::findOrFail($idactividad);
    	$actividad->condicion='0';
    	$actividad->update();
    	return Redirect::to('admin/actividad');
    }
}

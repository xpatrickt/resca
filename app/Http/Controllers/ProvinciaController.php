<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Provincia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use resca\Http\Requests\ProvinciaFormRequest;
use DB;

class ProvinciaController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$provincias=DB::table('provincia as p')
            ->join('departamento as d','p.iddepartamento','=','d.iddepartamento')
            ->select('p.idprovincia','p.nombreprovincia','d.nombredepartamento as departamento')
            ->where('p.nombreprovincia','LIKE','%'.$query.'%')
    		->where('p.condicion','=','1')
    		->orderBy('p.idprovincia','desc')
    		->paginate(100);
    		return view('admin.provincia.index',["provincias"=>$provincias,"searchText"=>$query]);
    	}
    }
    public function create(){
    	$departamentos=DB::table('departamento')->where('condicion','=','1')->get();
        return view("admin.provincia.create",["departamentos"=>$departamentos]);
    }
    public function store(ProvinciaFormRequest $request){
    	$provincia=new Provincia;
        $provincia->idprovincia=$request->get('codigo');
        $provincia->nombreprovincia=$request->get('nombre');
       	    	$provincia->condicion='1';
        $provincia->iddepartamento=$request->get('iddepartamento');
   		$provincia->save();
   		return Redirect::to('admin/provincia');
    }

  

    public function show($idprovincia){
    	return view("admin.provincia.show",["provincia"=>Provincia::findOrFail($idprovincia)]);
    }
    public function edit($idprovincia){
        $provincia=Provincia::findOrFail($idprovincia);
        $departamentos=DB::table('departamento')->where('condicion','=','1')->get();
    	return view("admin.provincia.edit",["provincia"=>$provincia,"departamentos"=>$departamentos]);
    }
    public function update(ProvinciaFormRequest $request,$idprovincia){
    	$provincia=Provincia::findOrFail($idprovincia);
        $provincia->idprovincia=$request->get('codigo');
    	$provincia->nombreprovincia=$request->get('nombre');
    	        $provincia->iddepartamento=$request->get('iddepartamento');
    	$provincia->update();
    	return Redirect::to('admin/provincia');    	
    }
    public function destroy($idprovincia){
    	$provincia=Provincia::findOrFail($idprovincia);
    	$provincia->condicion='0';
    	$provincia->update();
    	return Redirect::to('admin/provincia');
    }
}

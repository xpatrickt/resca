<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Distrito;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use resca\Http\Requests\DistritoFormRequest;
use DB;

class DistritoController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$distritos=DB::table('distrito as d')
            ->join('provincia as p','d.idprovincia','=','p.idprovincia')
            ->select('d.iddistrito','d.nombredistrito','p.nombreprovincia as provincia')
            ->where('d.nombredistrito','LIKE','%'.$query.'%')
    		->where('d.condicion','=','1')
    		->orderBy('d.iddistrito','desc')
    		->paginate(100);
    		return view('admin.distrito.index',["distritos"=>$distritos,"searchText"=>$query]);
    	}
    }
    public function create(){
    	$provincias=DB::table('provincia')->where('condicion','=','1')->get();
        return view("admin.distrito.create",["provincias"=>$provincias]);
    }
    public function store(DistritoFormRequest $request){
    	$distrito=new Distrito;
        $distrito->iddistrito=$request->get('codigo');
        $distrito->nombredistrito=$request->get('nombre');
       	    	$distrito->condicion='1';
        $distrito->idprovincia=$request->get('idprovincia');
   		$distrito->save();
   		return Redirect::to('admin/distrito');
    }

    public function show($iddistrito){
    	return view("admin.distrito.show",["distrito"=>Distrito::findOrFail($iddistrito)]);
    }
    public function edit($iddistrito){
        $distrito=Distrito::findOrFail($iddistrito);
        $provincias=DB::table('provincia')->where('condicion','=','1')->get();
    	return view("admin.distrito.edit",["distrito"=>$distrito,"provincias"=>$provincias]);
    }
    public function update(DistritoFormRequest $request,$iddistrito){
    	$distrito=Distrito::findOrFail($iddistrito);
        $distrito->iddistrito=$request->get('codigo');
    	$distrito->nombredistrito=$request->get('nombre');
    	        $distrito->idprovincia=$request->get('idprovincia');
    	$distrito->update();
    	return Redirect::to('admin/distrito');    	
    }
    public function destroy($iddistrito){
    	$distrito=Distrito::findOrFail($iddistrito);
    	$distrito->condicion='0';
    	$distrito->update();
    	return Redirect::to('admin/distrito');
    }
}

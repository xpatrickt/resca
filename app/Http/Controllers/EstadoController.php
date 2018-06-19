<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Estado;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use resca\Http\Requests\EstadoFormRequest;
use DB;

class EstadoController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$estados=DB::table('estado')->where('nombreestado','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('idestado','desc')
    		->paginate(10000000);
    		return view('admin.estado.index',["estados"=>$estados,"searchText"=>$query]);
    	}
    }
    public function create(){
        return view("admin.estado.create");
    }
    public function store(EstadoFormRequest $request){
    	$estado=new Estado;
        $estado->nombreestado=$request->get('nombre');
    	$estado->condicion='1';
   		$estado->save();
   		return Redirect::to('admin/estado');
    }

    public function show($idestado){
    	return view("admin.estado.show",["estado"=>Estado::findOrFail($idestado)]);
    }
    public function edit($idestado){
    	return view("admin.estado.edit",["estado"=>Estado::findOrFail($idestado)]);
    }
    public function update(EstadoFormRequest $request,$idestado){
    	$estado=Estado::findOrFail($idestado);
    	$estado->nombreestado=$request->get('nombre');
    	$estado->update();
    	return Redirect::to('admin/estado');    	
    }
    public function destroy($idestado){
    	$estado=Estado::findOrFail($idestado);
    	$estado->condicion='0';
    	$estado->update();
    	return Redirect::to('admin/estado');
    }
}

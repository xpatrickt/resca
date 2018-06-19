<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Cargo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use resca\Http\Requests\CargoFormRequest;
use DB;

class CargoController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$cargos=DB::table('cargo')->where('nombrecargo','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('idcargo','desc')
    		->paginate(10000000);
    		return view('admin.cargo.index',["cargos"=>$cargos,"searchText"=>$query]);
    	}
    }
    public function create(){
        return view("admin.cargo.create");
    }
    public function store(CargoFormRequest $request){
    	$cargo=new Cargo;
        $cargo->nombrecargo=$request->get('nombre');
    	$cargo->condicion='1';
   		$cargo->save();
   		return Redirect::to('admin/cargo');
    }

    public function show($idcargo){
    	return view("admin.cargo.show",["cargo"=>Cargo::findOrFail($idcargo)]);
    }
    public function edit($idcargo){
    	return view("admin.cargo.edit",["cargo"=>Cargo::findOrFail($idcargo)]);
    }
    public function update(CargoFormRequest $request,$idcargo){
    	$cargo=Cargo::findOrFail($idcargo);
    	$cargo->nombrecargo=$request->get('nombre');
    	$cargo->update();
    	return Redirect::to('admin/cargo');    	
    }
    public function destroy($idcargo){
    	$cargo=Cargo::findOrFail($idcargo);
    	$cargo->condicion='0';
    	$cargo->update();
    	return Redirect::to('admin/cargo');
    }
}

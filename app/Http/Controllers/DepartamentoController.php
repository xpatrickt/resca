<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Departamento;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\DepartamentoFormRequest;
use DB;

class DepartamentoController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$departamentos=DB::table('departamento')->where('nombredepartamento','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('iddepartamento','desc')
    		->paginate(100);
    		return view('admin.departamento.index',["departamentos"=>$departamentos,"searchText"=>$query]);
    	   
        }
    }

    public function create(){
    	return view("admin.departamento.create");
    }
    public function store(departamentoFormRequest $request){
    	$departamento=new Departamento;
        $departamento->iddepartamento=$request->get('codigo');
        $departamento->nombredepartamento=$request->get('nombre');
    	$departamento->condicion='1';
   		$departamento->save();
   		return Redirect::to('admin/departamento');
    }

    public function show($iddepartamento){
    	return view("admin.departamento.show",["departamento"=>departamento::findOrFail($iddepartamento)]);
    }
    public function edit($iddepartamento){
    	return view("admin.departamento.edit",["departamento"=>departamento::findOrFail($iddepartamento)]);
    }
    public function update(departamentoFormRequest $request,$iddepartamento){
    	$departamento=departamento::findOrFail($iddepartamento);
        $departamento->iddepartamento=$request->get('codigo');
    	$departamento->nombredepartamento=$request->get('nombre');
    	$departamento->update();
    	return Redirect::to('admin/departamento');    	
    }
    public function destroy($iddepartamento){
    	$departamento=departamento::findOrFail($iddepartamento);
    	$departamento->condicion='0';
    	$departamento->update();
    	return Redirect::to('admin/departamento');
    }
}

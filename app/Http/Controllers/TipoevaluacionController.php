<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Tipoevaluacion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use resca\Http\Requests\TipoevaluacionFormRequest;
use DB;

class TipoevaluacionController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$tipoevaluaciones=DB::table('tipoevaluacion')->where('nombretipoevaluacion','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('idtipoevaluacion','desc')
    		->paginate(10000000);
    		return view('admin.tipoevaluacion.index',["tipoevaluaciones"=>$tipoevaluaciones,"searchText"=>$query]);
    	}
    }
    public function create(){
        return view("admin.tipoevaluacion.create");
    }
    public function store(TipoevaluacionFormRequest $request){
    	$tipoevaluacion=new Tipoevaluacion;
        $tipoevaluacion->nombretipoevaluacion=$request->get('nombre');
    	$tipoevaluacion->condicion='1';
   		$tipoevaluacion->save();
   		return Redirect::to('admin/tipoevaluacion');
    }

    public function show($idtipoevaluacion){
    	return view("admin.tipoevaluacion.show",["tipoevaluacion"=>Tipoevaluacion::findOrFail($idtipoevaluacion)]);
    }
    public function edit($idtipoevaluacion){
    	return view("admin.tipoevaluacion.edit",["tipoevaluacion"=>Tipoevaluacion::findOrFail($idtipoevaluacion)]);
    }
    public function update(TipoevaluacionFormRequest $request,$idtipoevaluacion){
    	$tipoevaluacion=Tipoevaluacion::findOrFail($idtipoevaluacion);
    	$tipoevaluacion->nombretipoevaluacion=$request->get('nombre');
    	$tipoevaluacion->update();
    	return Redirect::to('admin/tipoevaluacion');    	
    }
    public function destroy($idtipoevaluacion){
    	$tipoevaluacion=Tipoevaluacion::findOrFail($idtipoevaluacion);
    	$tipoevaluacion->condicion='0';
    	$tipoevaluacion->update();
    	return Redirect::to('admin/tipoevaluacion');
    }
}

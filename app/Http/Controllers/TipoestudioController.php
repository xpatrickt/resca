<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Tipoestudio;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\TipoestudioFormRequest;
use DB;

class TipoestudioController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$tipoestudios=DB::table('tipoestudio')->where('nombretipoestudio','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('idtipoestudio','desc')
    		->paginate(100);
    		return view('admin.tipoestudio.index',["tipoestudios"=>$tipoestudios,"searchText"=>$query]);
    	   
        }
    }

    public function create(){
    	return view("admin.tipoestudio.create");
    }
    public function store(tipoestudioFormRequest $request){
    	$tipoestudio=new Tipoestudio;
        $tipoestudio->nombretipoestudio=$request->get('nombre');
       	$tipoestudio->siglastipoestudio=$request->get('siglas');
    	$tipoestudio->condicion='1';
   		$tipoestudio->save();
   		return Redirect::to('admin/tipoestudio');
    }

    public function show($idtipoestudio){
    	return view("admin.tipoestudio.show",["tipoestudio"=>Tipoestudio::findOrFail($idtipoestudio)]);
    }
    public function edit($idtipoestudio){
    	return view("admin.tipoestudio.edit",["tipoestudio"=>Tipoestudio::findOrFail($idtipoestudio)]);
    }
    public function update(TipoestudioFormRequest $request,$idtipoestudio){
    	$tipoestudio=Tipoestudio::findOrFail($idtipoestudio);
    	$tipoestudio->nombretipoestudio=$request->get('nombre');
    	$tipoestudio->siglastipoestudio=$request->get('siglas');
    	$tipoestudio->update();
    	return Redirect::to('admin/tipoestudio');    	
    }
    public function destroy($idtipoestudio){
    	$tipoestudio=Tipoestudio::findOrFail($idtipoestudio);
    	$tipoestudio->condicion='0';
    	$tipoestudio->update();
    	return Redirect::to('admin/tipoestudio');
    }
}

<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Catalogo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use resca\Http\Requests\CatalogoFormRequest;
use DB;

class CatalogoController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$catalogos=DB::table('catalogo as c')
            ->join('actividad as a','c.idactividad','=','a.idactividad')
            ->select('c.idcatalogo','c.nombrecatalogo','c.descripcioncatalogo','a.nombreactividad as actividad')
            ->where('c.nombrecatalogo','LIKE','%'.$query.'%')
    		->where('c.condicion','=','1')
    		->orderBy('c.idcatalogo','desc')
    		->paginate(100);
    		return view('admin.catalogo.index',["catalogos"=>$catalogos,"searchText"=>$query]);
    	}
    }
    public function create(){
    	$actividades=DB::table('actividad')->where('condicion','=','1')->get();
        return view("admin.catalogo.create",["actividades"=>$actividades]);
    }
    public function store(CatalogoFormRequest $request){
    	$catalogo=new Catalogo;
        $catalogo->nombrecatalogo=$request->get('nombre');
       	$catalogo->descripcioncatalogo=$request->get('descripcion');
    	$catalogo->condicion='1';
        $catalogo->idactividad=$request->get('idactividad');
   		$catalogo->save();
   		return Redirect::to('admin/catalogo');
    }

    public function show($idcatalogo){
    	return view("admin.catalogo.show",["catalogo"=>Catalogo::findOrFail($idcatalogo)]);
    }
    public function edit($idcatalogo){
        $catalogo=Catalogo::findOrFail($idcatalogo);
        $actividades=DB::table('actividad')->where('condicion','=','1')->get();
    	return view("admin.catalogo.edit",["catalogo"=>$catalogo,"actividades"=>$actividades]);
    }
    public function update(CatalogoFormRequest $request,$idcatalogo){
    	$catalogo=Catalogo::findOrFail($idcatalogo);
    	$catalogo->nombrecatalogo=$request->get('nombre');
    	$catalogo->descripcioncatalogo=$request->get('descripcion');
        $catalogo->idactividad=$request->get('idactividad');
    	$catalogo->update();
    	return Redirect::to('admin/catalogo');    	
    }
    public function destroy($idcatalogo){
    	$catalogo=Catalogo::findOrFail($idcatalogo);
    	$catalogo->condicion='0';
    	$catalogo->update();
    	return Redirect::to('admin/catalogo');
    }
}

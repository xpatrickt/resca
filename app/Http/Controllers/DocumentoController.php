<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Documento;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\DocumentoFormRequest;
use DB;

class DocumentoController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$documentos=DB::table('documento')->where('nombredocumento','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('iddocumento','desc')
    		->paginate(100);
    		return view('admin.documento.index',["documentos"=>$documentos,"searchText"=>$query]);
    	   
        }
    }

    public function create(){
    	return view("admin.documento.create");
    }
    public function store(DocumentoFormRequest $request){
    	$documento=new Documento;
        $documento->nombredocumento=$request->get('nombre');
       	$documento->descripciondocumento=$request->get('descripcion');
    	$documento->condicion='1';
   		$documento->save();
   		return Redirect::to('admin/documento');
    }

    public function show($iddocumento){
    	return view("admin.documento.show",["documento"=>documento::findOrFail($iddocumento)]);
    }
    public function edit($iddocumento){
    	return view("admin.documento.edit",["documento"=>documento::findOrFail($iddocumento)]);
    }
    public function update(documentoFormRequest $request,$iddocumento){
    	$documento=documento::findOrFail($iddocumento);
    	$documento->nombredocumento=$request->get('nombre');
    	$documento->descripciondocumento=$request->get('descripcion');
    	$documento->update();
    	return Redirect::to('admin/documento');    	
    }
    public function destroy($iddocumento){
    	$documento=documento::findOrFail($iddocumento);
    	$documento->condicion='0';
    	$documento->update();
    	return Redirect::to('admin/documento');
    }
}

<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Instrumento;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\InstrumentoFormRequest;
use DB;

class InstrumentoController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$instrumentos=DB::table('instrumento_gestion')->where('nombreinstrumentog','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('idinstrumentog','desc')
    		->paginate(100);
    		return view('admin.instrumento.index',["instrumentos"=>$instrumentos,"searchText"=>$query]);
        }
    }

    public function create(){
    	return view("admin.instrumento.create");
    }
    public function store(InstrumentoFormRequest $request){
    	$instrumento=new Instrumento;
        $instrumento->nombreinstrumentog=$request->get('nombre');
       	$instrumento->siglasinstrumentog=$request->get('siglas');
    	$instrumento->condicion='1';
   		$instrumento->save();
   		return Redirect::to('admin/instrumento');
    }

    public function show($idinstrumentog){
    	return view("admin.instrumento.show",["instrumento"=>instrumento::findOrFail($idinstrumentog)]);
    }
    public function edit($idinstrumentog){
    	return view("admin.instrumento.edit",["instrumento"=>instrumento::findOrFail($idinstrumentog)]);
    }
    public function update(InstrumentoFormRequest $request,$idinstrumentog){
    	$instrumento=instrumento::findOrFail($idinstrumentog);
        $instrumento->nombreinstrumentog=$request->get('nombre');
        $instrumento->siglasinstrumentog=$request->get('siglas');
    	$instrumento->update();
    	return Redirect::to('admin/instrumento');    	
    }
    public function destroy($idinstrumentog){
    	$instrumento=instrumento::findOrFail($idinstrumentog);
    	$instrumento->condicion='0';
    	$instrumento->update();
    	return Redirect::to('admin/instrumento');
    }
}

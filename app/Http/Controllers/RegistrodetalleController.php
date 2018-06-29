<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Delimitacionestudio;
use resca\Documentoestudio;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

class RegistrodetalleController extends Controller
{
        public function __construct(){

    }

    //DELIMITACION ESTUDIO
    public function destroy(Request $request, $iddelimitacionestudio){
         $delimitacion=Delimitacionestudio::findOrFail($iddelimitacionestudio);
         $delimitacion->condicion='0';
         $delimitacion->update();
         $idestudio=$request->get('idestudiodelimitacion');
        return Redirect::to('admin/registrodetalle/'.$idestudio);
    }
    
    //DOCUMENTO ESTUDIO
    public function edit(Request $request, $iddocumentoestudio){
        $documento=Documentoestudio::findOrFail($iddocumentoestudio);
        $documento->condicion='0';
        $documento->update();
        $idestudio=$request->get('idestudiodocumento');
    	return Redirect::to('admin/registrodetalle/'.$idestudio);
    }
    
}

<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\User;
use resca\Persona;
use resca\Rolusuario;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\DetalleusuarioFormRequest;
use resca\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Collection;


class DetalleusuarioController extends Controller
{
        public function __construct(){

    }
    public function index(){
    	
        $idusuario = Auth::user()->id;
    		$usuarios=DB::table('users as u')
    		->join('persona as p','p.idpersona','=','u.idpersona')
        ->join('role_user as ru','ru.user_id','=','u.id')
        ->join('roles as r','r.id','=','ru.role_id')
        	->select('u.id as id','u.name as name','u.email','r.name as privilegio','p.nombrepersona as nombre','p.apellidospersona as apellido')
    		->where('u.id','LIKE',''.$idusuario.'')
    		->where('u.condicion','=','1')
    		->orderBy('u.id','desc')
    		->paginate(999999);
    		return view('admin.detalleusuario.index',["usuarios"=>$usuarios]);
    	  
    }

    public function edit($id){
         $user=User::findOrFail($id);
      return view("admin.detalleusuario.edit",["user"=>$user]);
    }
    public function update(DetalleusuarioFormRequest $request,$id){
        $users=User::findOrFail($id);
        $users->password=bcrypt($request->get('password'));
        $users->update();
        return redirect('login')->with(Auth::logout());
    	//return Redirect::to('admin/detalleusuario');    	
    }

    public function show($id){
      return view("admin.detalleusuario.show",["user"=>User::findOrFail($id)]);
    }
}

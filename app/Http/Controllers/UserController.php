<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\User;
use resca\Persona;
use resca\Rolusuario;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\UserFormRequest;
use DB;

class UserController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$usuarios=DB::table('users as u')
    		->join('persona as p','p.idpersona','=','u.idpersona')
        ->join('role_user as ru','ru.user_id','=','u.id')
        ->join('roles as r','r.id','=','ru.role_id')
        	->select('u.id','u.name','u.email','r.name as privilegio','p.nombrepersona','p.apellidospersona','p.dnipersona')
    		->where('u.name','LIKE','%'.$query.'%')
    		->where('u.condicion','=','1')
    		->orderBy('u.id','desc')
    		->paginate(999999);
    		return view('admin.user.index',["usuarios"=>$usuarios,"searchText"=>$query]);
    	   
        }
    }

    public function create(){
    $roles=DB::table('roles')->get();
    $personas=DB::table('persona')
    ->select(DB::raw('CONCAT(persona.nombrepersona," ",persona.apellidospersona) AS nombres'),'persona.idpersona')->where('persona.condicion','=','1')->get();
    	return view("admin.user.create",["personas"=>$personas],["roles"=>$roles]);
    }

    public function store(UserFormRequest $request){
    	$users=new User;
        $users->name=$request->get('nombre');
       	$users->email=$request->get('email');
       	$users->password=bcrypt($request->get('password'));
        $users->idpersona=$request->get('idpersona');
    	$users->condicion='1';
   		$users->save();
   		$idusuario = $users->id;
   		$role_user=new Rolusuario;
   		$role_user->user_id=$idusuario;
   		$role_user->role_id=$request->get('idrol');
   		$role_user->save();
   		return Redirect::to('admin/user');
    }

    public function show($id){
    	return view("admin.user.show",["user"=>user::findOrFail($id)]);
    }

    public function edit($id){
         $user=User::findOrFail($id);
         $rolusuario=DB::table('role_user as ru')
         ->join('users as u','u.id','=','ru.user_id')
         ->join('roles as r','r.id','=','ru.role_id')
         ->select('r.id as idrol','r.name as privilegio')->where('ru.user_id','=',''.$id.'')->get();        
         $roles=DB::table('roles')->get();
         $personas=DB::table('persona')
         ->select(DB::raw('CONCAT(persona.nombrepersona," ",persona.apellidospersona) AS nombres'),'persona.idpersona')->where('persona.condicion','=','1')->get();
      return view("admin.user.edit",["user"=>$user,"roles"=>$roles,"personas"=>$personas,"$rolusuario"=>$rolusuario]);
    }
    public function update(PersonaFormRequest $request,$idpersona){
    	$persona=persona::findOrFail($idpersona);
        $persona->nombrepersona=$request->get('nombre');
       	$persona->apellidospersona=$request->get('apellidos');
       	$persona->dnipersona=$request->get('dni');
       	$persona->telefonopersona=$request->get('telefono');
       	$persona->direccionpersona=$request->get('direccion');
       	$persona->emailpersona=$request->get('email');
        $persona->idcargo=$request->get('idcargo');
        $persona->identidad=$request->get('identidad');
    	$persona->update();
    	return Redirect::to('admin/user');    	
    }
    public function destroy($id){
    	$users=users::findOrFail($id);
    	$users->condicion='0';
    	$users->update();
    	return Redirect::to('admin/user');
    }
}

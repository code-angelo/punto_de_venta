<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\User;
use Illuminate\support\Facades\DB;

class UsuariosController extends Controller
{
    
    public function index()
    {
        $usuarios = User::all()->where('estatus', '1');
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {   //
        return view('usuarios.create');
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'tipo'=>'required', 'telefono'=>'required']);
    //     Usuarios::create($request->all());
    //     return redirect()->route('usuarios.index')->with('success','Registro creado satisfactoriamente');
    // }

    public function show($id)
    {
        $usuario = Usuarios::find($id);
        return  view('usuarios.show',compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        return view('usuarios.edit', compact('usuario'));
    }

    // public function update(Request $request, $id)    {

    //     $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'tipo'=>'required', 'telefono'=>'required']);

    //     Usuarios::find($id)->update($request->all());
    //     return redirect()->route('usuarios.index')->with('success','Registro actualizado satisfactoriamente');
    // }
    public function update(Request $request, $id)    {

        $this->validate($request,[ 'nombre'=>'required', 'email'=>'required', 'password'=>'required', 'apellido'=>'required', 'telefono'=>'required']);
        

        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        if($request['tipo'] == 'admin'){

            DB::table('role_user')->where('user_id', $id)->update(['role_id' => 1]);

        } elseif ($request['tipo'] == 'user') {

            DB::table('role_user')->where('user_id', $id)->update(['role_id' => 2]);

        }
        // Role::where('user_id', $id)->update(['tipo' => $request->tipo]);
        return redirect()->route('usuarios.index')->with('success','Registro actualizado satisfactoriamente');
    }

    public function baja(Request $request, $id){

        $request->user()->authorizeRoles(['admin', 'user']);

        User::find($id)->update(['estatus' => 2]);
        return back()->with('success','Registro dado de baja satisfactoriamente');
    }

//   public function destroy($id)
//   {
//       //
//       Usuarios::find($id)->delete();
//       return back()->with('success','Registro eliminado satisfactoriamente');
//   }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class ClientesController extends Controller
{
    public function index()
    {   //solo muestra los clientes que su estatus es igual a 1
        $clientes = Clientes::all()->where('estatus', '1');
        return view('clientes.index', compact('clientes'));

    }

    public function getClientes(){
        $clientes = Clientes::all()->where('estatus', '1');
        return compact('clientes');
    }
  
    public function create()
    {   //
        return view('clientes.create');
    }
  
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'direccion'=>'required']);
        Clientes::create($request->all());
        return redirect()->route('clientes.index')->with('success','Registro creado satisfactoriamente');
    }
  
    public function show($id)
    {
        $cliente = Clientes::find($id);
        return  view('clientes.show',compact('cliente'));
    }
  
    public function edit($id)
    {
        $cliente = Clientes::find($id);
        return view('clientes.edit', compact('cliente'));
    }
  
    public function update(Request $request, $id)    {
  
        $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'direccion'=>'required']);
  
        Clientes::find($id)->update($request->all());
        return redirect()->route('clientes.index')->with('success','Registro actualizado satisfactoriamente');
  
    }
    //metodo para dar de baja el estatus de u cliente
    public function baja(Request $request, $id)    {

        $request->user()->authorizeRoles(['admin']);

        Clientes::find($id)->update(['estatus' => 2]);
        return back()->with('success','Registro dado de baja satisfactoriamente');
  
    }
  
    // public function destroy($id)
    // {
    //     Clientes::find($id)->delete();
    //     return redirect()->route('clientes.index')->with('success','Registro eliminado satisfactoriamente');
    // }
}

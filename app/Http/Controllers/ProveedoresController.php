<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedores;

class ProveedoresController extends Controller
{
    public function index()
  {
      $proveedores = Proveedores::all()->where('estatus', '1');
      return view('proveedores.index', compact('proveedores'));
  }

  public function create()
  {   //
      return view('proveedores.create');
  }

  public function store(Request $request)
  {
      $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'telefono'=>'required']);
      Proveedores::create($request->all());
      return redirect()->route('proveedores.index')->with('success','Registro creado satisfactoriamente');
  }

  public function show($id)
  {
      $proveedor = Proveedores::find($id);
      return  view('proveedores.show',compact('proveedor'));
  }

  public function edit($id)
  {
      $proveedor = Proveedores::find($id);
      return view('proveedores.edit', compact('proveedor'));
  }

  public function update(Request $request, $id)    {

      $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'telefono'=>'required']);

      Proveedores::find($id)->update($request->all());
      return redirect()->route('proveedores.index')->with('success','Registro actualizado satisfactoriamente');

  }

  public function baja(Request $request, $id){

    $request->user()->authorizeRoles(['admin']);

    Proveedores::find($id)->update(['estatus' => 2]);
    return back()->with('success','Registro dado de baja satisfactoriamente');

}

//   public function destroy($id)
//   {
//       Proveedores::find($id)->delete();
//       return redirect()->route('proveedores.index')->with('success','Registro eliminado satisfactoriamente');
//   }
}

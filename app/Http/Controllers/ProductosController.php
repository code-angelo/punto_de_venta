<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class ProductosController extends Controller
{

  public function index()
  {
      return view('productos.index');
    
  }

  public function create()
  {   //
      return view('productos.create');
  }

  public function store(Request $request)
  {
      $this->validate($request,[ 'nombre'=>'required', 'marca'=>'required', 'precio_adquirido'=>'required', 'precio_venta'=>'required', 'unidades'=>'required']);
      Productos::create($request->all());
      return redirect()->route('productos.index')->with('success','Registro creado satisfactoriamente');
  }

  public function show($id)
  {
      $producto = Productos::find($id);
      return  view('productos.show',compact('producto'));
  }

  public function edit($id)
  {
      $producto = Productos::find($id);
      return view('productos.edit', compact('producto'));
  }

  public function update(Request $request, $id)    {

      $this->validate($request,[ 'nombre'=>'required', 'marca'=>'required', 'precio_adquirido'=>'required', 'precio_venta'=>'required', 'unidades'=>'required']);

      Productos::find($id)->update($request->all());
      return redirect()->route('productos.index')->with('success','Registro actualizado satisfactoriamente');

  }

  public function baja(Request $request, $id)    {

    $request->user()->authorizeRoles(['admin']);

    $prod = Productos::find($id)->update(['estatus' => 2]);
    return back()->with('success','Registro dado de baja satisfactoriamente');

}

//   public function destroy($id)
//   {
//       $prod = Productos::find($id);
//       return compact('prod');
//   }

}

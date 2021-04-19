<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Ventas;
use App\Detalle_ventas;
use App\Productos;

class VentasController extends Controller
{
    public function index(){
        $clientes = Clientes::all()->where('estatus', '1');
        return view('ventas.index', compact('clientes'));
    }

    public function store(Request $request){

      $this->validate($request,[ 'producto'=>'required']);
      Ventas::create($request->all()); //almacena los datos de la venta en la tabla ventas
      
      $venta_id     = Ventas::select('id')->get()->last(); // obtener ultimo id de la venta generada
      $producto_id  = $request['producto_id'];
      $producto     = $request['producto'];
      $precio       = $request['precio'];
      $cantidad     = $request['cantidad'];

      for ($i=0; $i <sizeof($producto_id); $i++) {
        // echo($venta_id);
        Detalle_ventas::create(['venta_id' => $venta_id['id'], 'producto_id' => $producto_id[$i], 'producto' => $producto[$i], 'precio' => $precio[$i], 'cantidad' => $cantidad[$i]]);
        
        // $id = Productos::select('id')->where('id', $producto_id[$i]);
        $uni = Productos::find($producto_id[$i]);
        Productos::find($producto_id[$i])->update(['unidades' => $uni['unidades'] - $cantidad[$i] ]);

      }
      return back()->with('success','Venta exitosa');
    
    //   $this->validate($request,[ 'nombre'=>'required', 'marca'=>'required', 'precio_adquirido'=>'required', 'precio_venta'=>'required', 'unidades'=>'required']);
    }

}

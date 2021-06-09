<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedores;
use App\Compras;
use App\Productos;
use App\Detalle_compras;


class ComprasController extends Controller
{
    public function index(){
        $proveedores = Proveedores::all()->where('estatus', '1');
        return view('compras.index', compact('proveedores'));
    }

    public function store(Request $request){
      
      
      Compras::create($request->all()); //almacena los datos de la compra en la tabla compras

        $compra_id     = Compras::select('id')->get()->last(); // obtener ultimo id de la venta generada
        $producto_id  = $request['producto_id'];
        $producto     = $request['producto'];
        $precio       = $request['precio'];
        $cantidad     = $request['cantidad'];
  
        for ($i=0; $i <sizeof($producto_id); $i++) {
          // echo($venta_id);
          Detalle_compras::create(['compra_id' => $compra_id['id'], 'producto_id' => $producto_id[$i], 'producto' => $producto[$i], 'precio' => $precio[$i], 'cantidad' => $cantidad[$i]]);
          
          // $id = Productos::select('id')->where('id', $producto_id[$i]);
          $uni = Productos::find($producto_id[$i]);
          Productos::find($producto_id[$i])->update(['unidades' => $uni['unidades'] + $cantidad[$i] ]);
  
        }
        return back()->with('success','Compra Realizada');
    
    }
}
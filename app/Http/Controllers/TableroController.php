<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;
use App\Compras;
use Illuminate\support\Facades\DB;

class TableroController extends Controller
{
    public function index(){

        $ventas = Ventas::latest()->take(50)->get();
        $compras = Compras::latest()->take(50)->get();
        return view('tablero.index', compact('ventas', 'compras'));

        //pruebas de precios de ventas
        // $ventas = DB::table("ventas")->sum('total');
        // return compact('ventas');
    }
}

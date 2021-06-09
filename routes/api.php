<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('productos', function(){
    
    // return App\Productos::all();
    return datatables()
    ->eloquent(App\Productos::query()->where('estatus', '1'))
    ->addColumn('estado', 'productos/estatus') //agrega columna estado al ajax y regresa lo que hay en la view estatus
    ->addColumn('opciones', 'productos/acciones')
    ->rawColumns(['estado', 'opciones'])
    ->toJson();
});
//para filtrar
Route::get('buscar', function(){
    
    // return App\Productos::all();
    return datatables()
    ->eloquent(App\Productos::query()->where('estatus', '1' )->where('unidades', '>=','1'))
    // ->addColumn('estado', 'productos/estatus') //agrega columna estado al ajax y regresa lo que hay en la view estatus
    ->addColumn('opciones', 'ventas/acciones')
    ->rawColumns(['opciones'])
    ->toJson();
});
//para surtir los productos (comprar)
Route::get('compras', function(){
    
    // return App\Productos::all();
    return datatables()
    ->eloquent(App\Productos::query()->where('estatus', '1' ))
    // ->addColumn('estado', 'productos/estatus') //agrega columna estado al ajax y regresa lo que hay en la view estatus
    ->addColumn('opciones', 'compras/acciones')
    ->rawColumns(['opciones'])
    ->toJson();
});

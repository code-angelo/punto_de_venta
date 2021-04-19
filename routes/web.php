<?php




Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return redirect('/login');
});


Route::group(['middleware'=> 'auth'], function(){
    
    // aqui van las rutas que se ejecutan solo estando logueado con usuarios
    Route::get('/tab', 'ChartDataController@getMonthlySellData');
    Route::get('/tab2', 'ChartDataController@getMonthlyBuyData');
    Route::get('/tabVentas', 'ChartDataController@getVentasTotales');
    Route::resource('tablero', 'TableroController');

    // rutas de ventas
    Route::resource('ventas', 'VentasController');
    
    // rutas de compras
    Route::resource('compras', 'ComprasController');
    
    // rutas de productos
    Route::get('productos/{id}', 'ProductosController@baja');
    Route::resource('productos', 'ProductosController');
    
    // rutas de usuarios
    Route::get('usuarios/{id}', 'UsuariosController@baja');
    Route::resource('usuarios', 'UsuariosController');
    
    // ruta de clientes
    Route::get('clientes/{id}', 'ClientesController@baja');
    Route::resource('clientes', 'ClientesController');
    
    // ruta de proveedores
    Route::get('proveedores/{id}', 'ProveedoresController@baja');
    Route::resource('proveedores', 'ProveedoresController');
    
});









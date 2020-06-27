<?php
Auth::routes();

//Route::get('/', function () {
   //return view('/login');
//});
Route::get('/clientes','ClientController@index')
	->name('clients.index');
Route::get('/clientes/crear','ClientController@create')
	->name('client.create');
Route::get('/cliente/{client}','ClientController@show')
	->where('client','\d+')
	->name('client.show');
Route::post('/cliente/crear','ClientController@store')
	->name('client.store');
Route::get('/cliente/{client}/editar','ClientController@edit')
	->name('client.edit');
Route::put('/cliente/{client}','ClientController@update')
	->name('client.update');
Route::delete('/cliente/{client}/eliminar','ClientController@destroy')
	->name('client.destroy');




Route::get('/productos','ProductController@index')
	->name('products.index');

Route::get('/productos/crear','ProductController@create')
	->name('products.create');

Route::get('/producto/{product}','ProductController@show')
	->where('product','\d+')
	->name('product.show');

Route::post('/producto/crear','ProductController@store')
	->name('products.store');

Route::get('/producto/{product}/editar','ProductController@edit')
	->name('product.edit');

Route::put('/producto/{product}','ProductController@update')
	->name('product.update');
	
Route::delete('/producto/{product}/eliminar','ProductController@destroy')
	->name('product.destroy');



Route::get('/ventas','SaleController@index')
	->name('sales.index');
Route::get('/ventas/crear','SaleController@create')
	->name('sales.create');
Route::get('/venta/{sale}','SaleController@show')
	->where('sale','\d+')
	->name('sale.show');
Route::post('/venta/crear','SaleController@store')
	->name('sale.store');
Route::get('/venta/{sale}/editar','SaleController@edit')
	->name('sale.edit');
//Route::put('/venta/{sale}','SaleController@update')
	//->name('sale.update');
Route::delete('/venta/{sale}/eliminar','SaleController@destroy')
	->name('sale.destroy');
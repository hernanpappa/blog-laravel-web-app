<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Cuando la ruta es usada se ejecuta la funcion (por ejemplo inicio) del controlador PagesController

Route::get('/', 'PagesController@inicio')->name('inicio');

Route::get('/detalles/{id}', 'PagesController@detalle')->name('notas.detalle');

Route::post('/', 'PagesController@crear')->name('notas.crear');

Route::get('/editar/{id}', 'PagesController@editar')->name('notas.editar');

Route::put('/editar/{id}', 'PagesController@update')->name('notas.update');

Route::delete('/eliminar/{id}', 'PagesController@eliminar')->name('notas.eliminar');

Route::get('fotos', 'PagesController@fotos')->name('foto');

Route::get('noticias', 'PagesController@noticias')->name('noticias');


Route::get('nosotros/{nombre?}', 'PagesController@nosotros')->name('nosotros');


/* // nosotros/{nombre} agrega un parametro a la url que aun no conocemos. El ? lo vuelve opcional
Route::get('nosotros/{nombre?}', function($nombre = null){ //a la funcion le tenemos que pasar el parametro, en este caso $nombre y le podemos asignar un valor por defecto en este caso es null

$equipo = ['Ignacio', 'Juanitos', 'Los pablos'];

// return view('nosotros', ['equipo'=>$equipo]); //compact('equipo') hace lo mismo que ['equipo'=>$equipo]
return view('nosotros', compact('equipo', 'nombre')); //compact pasa un parametro cuando retorna la vista

})->name('nosotros'); */
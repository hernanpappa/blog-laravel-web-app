<?php

//Este archivo nos separa la logica de las rutas del archivo web.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    //

    public function inicio(){
        $notas = App\Nota::paginate(2); //toma todos los datos de la tabla notas

        return view('welcome', compact('notas'));
    }

    public function detalle($id){

        $nota = App\Nota::findOrFail($id); //toma una nota en especifico buscada con el id, si no la encuentra redirecciona al error 404

        return view('notas.detalle', compact('nota'));

    }

    public function crear(Request $request){
        //return $request->all();

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);


        $notaNueva = new App\Nota;    //crea una instancia nota traida deste App\Nota (nuestro model de base de datos)
        $notaNueva->nombre = $request->nombre;  //guarda los datos en la instancia
        $notaNueva->descripcion = $request->descripcion;

        $notaNueva->save(); //guardo los datos de la instancia en la base de datos, sencillo

        return back()->with('mensaje', 'Nota agregada!'); //back nos devuelve a la pestania anterior

    }

    public function editar($id){

        $nota = App\Nota::findOrFail($id);

        return view('notas.editar', compact('nota'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
        
        $notaUpdate = App\Nota::findOrFail($id); //Creo una instancia nota que tenga el id especificado
        $notaUpdate->nombre = $request->nombre;  //Guarda los datos traidos de request en la instancia 
        $notaUpdate->descripcion = $request->descripcion;

        $notaUpdate->save(); //guardo los datos de la instancia en la base de datos

        return back()->with('mensaje', 'Nota actualizada');


    }

    public function eliminar($id){
        $notaElinimar = App\Nota::findOrFail($id);
        $notaElinimar->delete();

        return back()->with('mensaje', 'Nota Eliminada');
    }

    public function fotos(){
        return view('fotos');
    }

    public function nosotros($nombre = null){
        $equipo = ['Ignacio', 'Juanitos', 'Los pablos'];

         return view('nosotros', compact('equipo', 'nombre')); 
    }

    public function noticias(){
        return view('blog');
    }


}

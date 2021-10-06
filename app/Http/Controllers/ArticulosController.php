<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticulosController extends Controller
{
    public function index()
    {
        return view('livewire.articulos.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'contenido' => 'required',
            'id_sub_categoria' => 'required'
        ]);

        Articulos::create([
            'titulo' => ucwords($request->titulo),
            'contenido' => ucwords($request->contenido),
            'id_sub_categoria' => $request->id_sub_categoria,
            'user_creacion' => Auth::user()->id,
            "user_actualizacion" => Auth::user()->id
        ]);
        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        return redirect(route('articulos'))->with('mensaje', 'Registro exitoso');
    }


    public function create()
    {
        $subCategorias = SubCategoria::all();
        return view('livewire.articulos.create', compact('subCategorias'));
    }

    public function edit($id)
    {
        $articulo = Articulos::find($id);
        $subCategorias = SubCategoria::all();
        return view("livewire.articulos.update", compact('articulo', 'subCategorias'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'contenido' => 'required',
            'id_sub_categoria' => 'required'
        ]);
        $articulo =  Articulos::find($request->articulo);
        $articulo->titulo = ucwords($request->titulo);
        $articulo->contenido = $request->contenido;
        $articulo->id_sub_categoria = $request->id_sub_categoria;
        $articulo->user_actualizacion = Auth::user()->id;
        $articulo->save();
        return redirect(route('articulos'))->with('mensaje', 'Actualizacion exitosa');
    }
}
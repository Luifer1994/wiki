<?php

namespace App\Http\Livewire;

use App\Models\Articulos;
use App\Models\SubCategoria;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Articulo extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $titulo, $id_articulo, $id_sub_categoria, $contenido;
    public $searh = '';
    protected $listeners = ['delete'];

    public function render()
    {
        $subCategorias = SubCategoria::all();
        $articulos = Articulos::select('articulos.*', 'sub_categorias.nombre as nombreSubCategoria')
            ->join('sub_categorias', 'articulos.id_sub_categoria', '=', 'sub_categorias.id')
            ->where('articulos.titulo', 'LIKE', "%{$this->searh}%")
            ->orWhere('articulos.id', 'LIKE', "%{$this->searh}%")
            ->orWhere('sub_categorias.nombre', 'LIKE', "%{$this->searh}%")
            ->orderBy('id', 'Desc')->paginate(10);
        return view('livewire.articulos.articulo', compact('articulos', 'subCategorias'));
    }

    public function delete(Articulos $articulo)
    {

        $articulo->delete();
        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        $this->titulo = null;
        $this->id_sub_categoria = null;
        $this->contenido = null;
    }

    public function cancel()
    {
        $this->titulo = null;
        $this->id_sub_categoria = null;
        $this->contenido = null;
    }
}
<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\SubCategoria as ModelsSubCategoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SubCategoria extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $nombre, $id_categoria, $id_subCategoria;
    public $searh = '';

    protected $rules = [
        'nombre' => 'required'
    ];
    protected $messages = [
         'nombre.required' => 'El nombre es requerido.',
         'id_categoria.required' => 'La categoría es requerida.'
    ];

     protected $listeners = ['delete'];

    public function render()
    {
        $categorias = Categoria::all();
        $subCategorias = ModelsSubCategoria::select('sub_categorias.*','categorias.nombre as nombreCategoria')
        ->join('categorias', 'sub_categorias.id_categoria','=','categorias.id')
        ->where('sub_categorias.nombre', 'LIKE', "%{$this->searh}%")
        ->orWhere('sub_categorias.id', 'LIKE', "%{$this->searh}%")
        ->orWhere('categorias.nombre', 'LIKE', "%{$this->searh}%")
            ->orderBy('id', 'Desc')->paginate(10);
        return view('livewire.subCategoria.sub-categoria', compact('subCategorias','categorias'));
    }

    public function store(){

        $this->validate([
            'nombre' => 'required',
            'id_categoria' => 'required'
        ]);

        ModelsSubCategoria::create([
            'nombre' => ucwords($this->nombre),
            'id_categoria' => $this->id_categoria,
            'user_creacion' => Auth::user()->id,
            "user_actualizacion" => Auth::user()->id
        ]);
        $this->nombre = null;
        $this->id_categoria = null;
          //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'Registro exitoso');

        $this->emit('hide'); // Close model to using to jquery
    }


    public function edit($id){

        $subCategoria =  ModelsSubCategoria::find($id);
        $this->id_subCategoria = $subCategoria->id;
        $this->id_categoria = $subCategoria->id_categoria;
        $this->nombre  = $subCategoria->nombre;
    }

    public function update(){

        $this->validate([
            'nombre' => 'required',
            'id_categoria' => 'required'
        ]);

        $subCategoria =  ModelsSubCategoria::find($this->id_subCategoria);

        $subCategoria->update([
            'nombre' => ucwords($this->nombre),
            'id_categoria' => $this->id_categoria,
            "user_actualizacion" => Auth::user()->id
        ]);
        $this->nombre = null;
        $this->id_categoria = null;
          //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'Actualizacion exitoso');

        $this->emit('hide'); // Close model to using to jquery
    }

    public function delete(ModelsSubCategoria $subCategoria){

        $subCategoria->delete();
        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'Registro elimiado con exito');
    }

    public function cancel()
    {
        $this->nombre = null;
        $this->id_categoria = null;
    }

}

<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Categorias extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $nombre, $id_categoria;
    public $searh = '';
    protected $rules = [
        'nombre' => 'required'
    ];
     protected $messages = ['nombre.required' => 'El nombre es requerido.'];

     protected $listeners = ['delete'];


    public function render()
    {
        $categorias = Categoria::where('nombre', 'LIKE', "%{$this->searh}%")
        ->orWhere('id', 'LIKE', "%{$this->searh}%")
            ->orderBy('id', 'Desc')->paginate(10);
        return view('livewire.categorias.categorias', compact('categorias'));
    }

    public function store(){

        $this->validate([
            'nombre' => 'required'
        ]);

        Categoria::create([
            'nombre' => ucwords($this->nombre),
            'user_creacion' => Auth::user()->id,
            "user_actualizacion" => Auth::user()->id
        ]);
        $this->nombre = null;
          //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'Registro exitoso');

          $this->emit('hide'); // Close model to using to jquery
    }

    public function edit($id){

        $categoria =  Categoria::find($id);
        $this->id_categoria = $categoria->id;
        $this->nombre  = $categoria->nombre;
    }

    public function update(){

        $this->validate([
            'nombre' => 'required'
        ]);

        $categoria = Categoria::find($this->id_categoria);

        $categoria->update([
            'nombre' => ucwords($this->nombre),
            "user_actualizacion" => Auth::user()->id
        ]);
        $this->nombre = null;
          //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'Actualizacion exitoso');

        $this->emit('hide'); // Close model to using to jquery
    }
    public function delete(Categoria $categoria){

        $categoria->delete();
        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'Registro elimiado con exito');
    }
    public function cancel()
    {
        $this->nombre = null;
    }
}

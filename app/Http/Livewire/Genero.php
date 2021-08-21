<?php

namespace App\Http\Livewire;

use App\Models\Genero as ModelsGenero;
use Livewire\Component;
use Livewire\WithPagination;

class Genero extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $nombre, $id_genero;
    public $searh = '';
    protected $rules = [
        'nombre' => 'required'
    ];
     protected $messages = ['nombre.required' => 'El nombre es requerido.'];

     protected $listeners = ['delete'];


    public function render()
    {
        $generos = ModelsGenero::where('nombre', 'LIKE', "%{$this->searh}%")
        ->orWhere('id', 'LIKE', "%{$this->searh}%")
            ->orderBy('id')->paginate(5);
        return view('livewire.genero.genero-component', compact('generos'));
    }

    public function store(){

        $this->validate([
            'nombre' => 'required'
        ]);

        ModelsGenero::create([
            'nombre' => ucwords($this->nombre)
        ]);
        $this->nombre = null;
          //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'Registro exitoso');

          $this->emit('hide'); // Close model to using to jquery
    }

     public function edit($id){

        $genero =  ModelsGenero::find($id);
        $this->id_genero = $genero->id;
        $this->nombre  = $genero->nombre;
    }


    public function update(){

        $this->validate([
            'nombre' => 'required'
        ]);

        $genero = ModelsGenero::find($this->id_genero);

        $genero->update([
            'nombre' => ucwords($this->nombre),
        ]);
        $this->nombre = null;
          //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'Actualizacion exitoso');

        $this->emit('hide'); // Close model to using to jquery
    }
    public function delete(ModelsGenero $genero){

        $genero->delete();
        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'Registro elimiado con exito');
    }
}

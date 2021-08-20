<?php

namespace App\Http\Livewire;

use App\Models\Genero as ModelsGenero;
use Livewire\Component;

class Genero extends Component
{
    public $nombre;
    protected $rules = [
        'nombre' => 'required'
    ];
     protected $messages = [
        'nombre.required' => 'El nombre es requerido.',
    ];

    public function render()
    {
        $generos = ModelsGenero::all();
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

          $this->emit('generoStore'); // Close model to using to jquery
    }
    public function delete($id){

        $genero = ModelsGenero::find($id);
        $genero->delete();

        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', true);
    }
}
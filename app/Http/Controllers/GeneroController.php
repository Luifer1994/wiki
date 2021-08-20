<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        return view('livewire.genero.index');
    }
}
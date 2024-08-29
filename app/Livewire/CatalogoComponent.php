<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
class CatalogoComponent extends Component
{
    public function render()
    {
        $datos = Http::get('https://fakestoreapi.com/products')->object();
        return view('livewire.catalogo-component')->with([
            'datos' => $datos,
        ])->title("Catálogo");
    }
}

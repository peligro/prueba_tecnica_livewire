<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Compras;
class ComprasComponent extends Component
{
    public function render()
    {
        $datos=Compras::orderBy('id', 'desc')->get();
        return view('livewire.compras-component')->with(['datos'=>$datos])->title('Compras');
    }
    public function mount( )
    {
        if(session('perfil_id')!='1')
        {
            abort(404);
        }
    }
}

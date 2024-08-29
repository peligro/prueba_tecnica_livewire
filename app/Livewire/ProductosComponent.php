<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
class ProductosComponent extends Component
{
    public $titulo;

    #[Validate('required', message:'El campo Title es obligatorio')]
    public $title;

    #[Validate('required', message:'El campo Price es obligatorio')]
    public $price;

    #[Validate('required', message:'El campo Description es obligatorio')]
    public $description;

    #[Validate('required', message:'El campo category es obligatorio')]
    public $category;

    use WithFileUploads;
    #[Validate('required', message: 'El campo foto está vacío')]
    #[Validate('mimes:jpg,png', message: 'El campo foto debe ser JPG|PNG')]
    public $image;
    public function render()
    {
        $datos = Http::get('https://fakestoreapi.com/products?sort=desc')->object();
        $categorias = Http::get('https://fakestoreapi.com/products/categories')->object();
        return view('livewire.productos-component')->with([
            'datos' => $datos, 'categorias'=>$categorias
        ])->title("Productos");
    }
    public function crear()
    {
        $this->titulo="Crear producto";
        $this->dispatch('modal', []);
    }
    public function save(Request $request)
    {
        $this->validate();
        //$this->dispatch('log2', ['mensaje'=>"title={$this->title}"]);
        $this->dispatch('swal', ['title'=>'Formulario procesado', 'mensaje'=>"title=", 'icon'=>'error']);
    }
    public function mount( )
    {
        if(session('perfil_id')!='1')
        {
            abort(404);
        }
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserMetadata;
use Illuminate\Http\Request;
class LoginComponent extends Component
{
    #[Validate('required', message: 'El campo E-Mail está vacío')]
    #[Validate('email', message: 'El E-Mail ingresado no es válido')]
    public $correo;

    #[Validate('required', message:'El campo Contraseña es obligatorio')]
    #[Validate('min:6', message: 'El campo Contraseña debe tener al menos 6 caracteres')]
    public $password;

    public function render()
    {
        return view('livewire.login-component');
    }
    public function save(Request $request)
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->correo,'password' => $this->password]))
        {
            $usuario = UserMetadata::where(['users_id'=>Auth::id()])->first();
            $request->session()->put('users_metadata_id', $usuario->id);
            $request->session()->put('perfil_id', $usuario->perfil_id);
            $request->session()->put('perfil', $usuario->perfil->nombre);
            return redirect()->route('ruta_home');
        }else
        {
            $this->correo="";
            $this->password="";
            $this->dispatch('swal', ['title'=>'Error', 'mensaje'=>'Las credenciales indicadas no son válidas', 'icon'=>'error']);
        }
    }
}

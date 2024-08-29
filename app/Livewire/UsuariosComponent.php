<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\UserMetadata;
use Illuminate\Support\Facades\Hash;
class UsuariosComponent extends Component
{
    public function render()
    {
        $datos = Http::get('https://reqres.in/api/users')->object();
        return view('livewire.usuarios-component')->with([
            'datos' => $datos,
        ])->title("Usuarios");
    }
    public function crearUsuarios()
    {
        $datos = Http::get('https://reqres.in/api/users')->object();
        foreach($datos->data as $dato)
        {
            $existe=User::where('email', $dato->email)->first();
            ///lo sé, es poco performante de esta manera, debería haberlo metido en un arreglo y luego recorrerlo, pero por tiempo esta vez lo haré así
            if(!is_object($existe))
            {
                $user=new User();
                $user->name=$dato->first_name." ".$dato->last_name;
                $user->email=$dato->email;
                $user->password=Hash::make('123456');
                $user->created_at=date('Y-m-d H:i:s');
                $user->save();

                $save=new UserMetadata();
                $save->users_id=$user->id;
                $save->perfil_id=2;
                $save->save();
            }
        }
        $this->dispatch('toast', ['mensaje'=>'Se creó el registro exitosamente', 'clase'=>'bg-success', 'icon'=>'bi-exclamation-lg'] );
        //podríamos refrescar la página. Me faltó también ponerle un coso al botón usuarios porque si se tarda en ejecutarse nos expone a que el usuario lo presione más de una vez por nervios
        //return redirect()->route('ruta_usuarios');
    }
}

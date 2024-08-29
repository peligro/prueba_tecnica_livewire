<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Compras;
use App\Models\User;
use App\Models\UserMetadata;
class CatalogoDetalleComponent extends Component
{
    public $id;
    public function render()
    {
        $datos = Http::get('https://fakestoreapi.com/products/'.$this->id)->object();
        if(!is_object($datos))
        {
            abort(404);
        }
        if(isset($_GET['token_ws']))
        {
            $pagado=1;
            $token_ws=$_GET['token_ws'];
            $compra=Compras::where(['token'=>$_GET['token_ws'], 'estado'=>'pendiente'])->firstOrFail();
            $compra->token=$_GET['token_ws'];
            $compra->estado='pagado';
            $compra->save();
            $pagos=[];

        }else
        {
            $pagado=0;
            $token_ws="";
            $compra=new Compras();
            $compra->token="";
            $compra->producto_id=$this->id;
            $compra->producto=$datos->title;
            $compra->monto=number_format($datos->price, 0, '', '');
            $compra->estado="pendiente";
            $compra->users_id=Auth::id();
            $compra->save();

            $response  = Http::withHeaders(
                [
                    'Content-Type' => 'application/json',
                    'Tbk-Api-Key-Id'=>env('WEBPAY_ID'),
                    'Tbk-Api-Key-Secret'=>env('WEBPAY_SECRET')
                ]
            )->post(env('WEBPAY_URL'),
            [
                'buy_order' => 'orden_'.$compra->id,
                'session_id' => 'sesion'.time(),
                'amount' => number_format($datos->price, 0, '', ''),
                'return_url'=>'http://192.168.1.88/clientes/tamila/test/constellationx-prueba-tecnica/public/catalogo/detalle/'.$this->id
            ]);
            if($response->status()!=200)
            {
                die("error");
            }
            $pagos=json_decode($response);
            //actualizo el token
            $save=Compras::find($compra->id);
            $save->token=$pagos->token;

            $save->save();
        }

        return view('livewire.catalogo-detalle-component')->with([
            'datos' => $datos, 'pagos'=>$pagos, 'compra'=>$compra, 'pagado'=>$pagado, 'token_ws'=>$token_ws
        ])->title($datos->title);
    }
    public function mount($id)
    {
        $this->id=$id;
    }
}

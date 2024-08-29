<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SalirController extends Controller
{
    public function ruta_salir(Request $request)
    {
        Auth::logout();
        $request->session()->forget('users_metadata_id');
        $request->session()->forget('perfil_id');
        $request->session()->forget('perfil');
        return redirect()->route('ruta_login');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMetadata;
class Acceso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()==false)
        {
            return redirect()->route('ruta_login');
        }
        $usuario = UserMetadata::where(['users_id'=>Auth::id()])->first();

        $request->session()->put('users_metadata_id', $usuario->id);
        $request->session()->put('perfil_id', $usuario->perfil_id);
        $request->session()->put('perfil', $usuario->perfil->nombre);
        return $next($request);
    }
}

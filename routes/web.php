<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Acceso;

use App\Livewire\HomeComponent;
use App\Livewire\UsuariosComponent;
use App\Livewire\LoginComponent;
use App\Livewire\ProductosComponent;
use App\Livewire\CatalogoComponent;
use App\Livewire\CatalogoDetalleComponent;
use App\Livewire\ComprasComponent;
use App\Http\Controllers\SalirController;

\Livewire\Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/clientes/tamila/test/constellationx-prueba-tecnica/public/livewire/update', $handle);
});


Route::get("/", HomeComponent::class)->name("ruta_home");
Route::get("/usuarios", UsuariosComponent::class)->name("ruta_usuarios");
Route::get("/productos", ProductosComponent::class)->name("ruta_productos")->middleware(Acceso::class);

Route::get("/catalogo", CatalogoComponent::class)->name("ruta_catalogo")->middleware(Acceso::class);
Route::get("/catalogo/detalle/{id}", CatalogoDetalleComponent::class)->name("ruta_catalogo_detalle")->middleware(Acceso::class);
Route::get("/compras", ComprasComponent::class)->name("ruta_compras")->middleware(Acceso::class);

Route::get("/login", LoginComponent::class)->name("ruta_login");
Route::get('/salir', [SalirController::class, 'ruta_salir'])->name("ruta_salir");

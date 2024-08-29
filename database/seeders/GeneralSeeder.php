<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perfil;
class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perfil::insert(
            [
            'id'=>1,
            'nombre' => "Administrador"
            ]
        );
        Perfil::insert(
            [
            'id'=>2,
            'nombre' => "Cliente"
            ]
        );
    }
}

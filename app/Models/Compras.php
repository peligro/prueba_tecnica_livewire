<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Compras extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table ='compras';
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;

    protected $fillabe = [
        'veiculo',
        'valor_tarifa',
        'valor_fraccion',
    ];


    //relacion de uno a uno
    public function transaciones ()
    {
    return $this->hasOne(Transaccion::class);
    }
}

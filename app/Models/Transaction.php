<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillabe = [
        'placa',
        'horaentrada',
        'horasalida',
        'tipo_veiculo',
        'estado',
        'tarifa_id',
        'user_id'
     ];


     //relacion belongsTo inversa de uno a muchos
     public function users()
     {
         return $this->belongsTo(User::class);
     }

    //relacion belongsTo inversa de uno a uno
     public function tarifas()
    {
        return $this->belongsTo(Tarifa::class);
    }
}

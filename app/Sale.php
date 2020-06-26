<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Sale as Authenticatable;

class Sale extends Model
{
   use Notifiable;

    protected $fillable = [
        'client_id','tipo_comprobante','numero_comprobante','state','total',
    ];
    //se deja  return $this->belongsTo(Client::class); para la convencion 'profession_id' caso contrario se debe mandar el argumento
    public function sale()
    {
        return $this->belongsTo(Sale::class,'id');
    }
}

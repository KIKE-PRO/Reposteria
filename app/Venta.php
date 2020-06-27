<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{ 
	use Notifiable;

    protected $fillable = [
        'name', 'dni', 'phone','adress','socialNetwork',
    ];
    //se deja  return $this->belongsTo(Client::class); para la convencion 'profession_id' caso contrario se debe mandar el argumento
    public function venta()
    {
        return $this->belongsTo(Client::class,'id');
    }
}
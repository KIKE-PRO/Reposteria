<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Client as Authenticatable;

class Client extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'dni', 'phone','adress','socialNetwork',
    ];
    //se deja  return $this->belongsTo(Client::class); para la convencion 'profession_id' caso contrario se debe mandar el argumento
    public function client()
    {
        return $this->belongsTo(Client::class,'id');
    }
}
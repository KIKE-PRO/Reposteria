<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Product as Authenticatable;

class Product extends Model
{
   use Notifiable;

    protected $fillable = [
        'name', 'description', 'priceV','priceF','foto',
    ];
    //se deja  return $this->belongsTo(Client::class); para la convencion 'profession_id' caso contrario se debe mandar el argumento
    public function product()
    {
        return $this->belongsTo(Product::class,'id');
    }
}

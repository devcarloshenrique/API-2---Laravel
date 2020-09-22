<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Country extends Model
{

    protected $fillable = ['name'];

    // nome da função no singular pois retorna apenas um valor
    public function location()
    {
        // Como a class Location está no mesmo diretorio de Country, não é necessário dar o use no topo
        return $this->hasOne(Location::class, 'country_id');
    }
}

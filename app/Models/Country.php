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

    // states no plural pois vai retornar mais de um valor
    public function states()
    {
        // Relacionamento de um para muitos, não é necessário passar o name space de State pois esta na mesma pasta

        //countries.id => PK
        //states.country_id => FK
        return $this->hasMany(State::class, 'country_id', 'id');
    }

    public function cities()
    {
        // Tenho que passar como primeiro parametro o que eu quero retornar, no caso cidade
        // Como segundo parametro eu tenho que retornar a model que faz a intermediação entre country e city, que no caso é State
        return $this->hasManyThrough(City::class, State::class);
    }
}

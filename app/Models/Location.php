<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['country_id', 'longitude', 'latitude'];

    public function country()
    {
        // Caso eu não tenha seguido os padrões recomendados em relação ao nome da coluna de relacionamento, eu consigo passar como parametro o nome da tabela desejada no banco;
        //Caso eu tenho trocado o nome da coluna primary key id para outro, você pode passar o outro nome como terceiro parametro.
        // Country PK id || Location FK country_id
        return $this->belongsTo(Country::class, 'country_id', 'id');
        return $this->belongsTo(Country::class);
    }
}

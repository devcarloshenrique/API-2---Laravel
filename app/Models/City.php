<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // Nome da função no plural pois vai retornar mais de um resultado
    public function companies()
    {
        // Por padrão o laravel estava buscando city_company
        // Relacionamento de muitos para muitos
        return $this->belongsToMany(Company::class, 'company_city');
    }

    // Logica que vai retornar os comentarios utilizando o relacionamento pholymorphic
    public function comments()
    {
        /**
         * 1º Parametro, Model que tem os comentários em si. Comment::class
         * 2º Parametro, Metodo de Comment::class que está fazendo o relacionamento polimorfico
         */
        return $this->morphMany(Comment::class, 'commentable');
    }
}

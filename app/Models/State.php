<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class State extends Model
{
    protected $fillable = ['name', 'initials', 'country_id'];
    //Como será retornado apenas um valor o nome da função estara no singular
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {

        // Como um state tem varias cities, hasOne => um para muitos
        return $this->hasMany(City::class);
    }

    public function comments()
    {
        /**
         * 1º Parametro, Model que tem os comentários em si. Comment::class
         * 2º Parametro, Metodo de Comment::class que está fazendo o relacionamento polimorfico
         */
        return $this->morphMany(Comment::class, 'commentable');
    }
}

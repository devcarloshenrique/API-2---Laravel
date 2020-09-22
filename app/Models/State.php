<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class State extends Model
{
    //Como será retornado apenas um valor o nome da função estara no singular
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}

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
}

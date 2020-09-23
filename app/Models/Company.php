<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // Nome da função no plural pois vai retornar mais de um resultado
    public function cities()
    {
        // Por padrão o laravel estava buscando city_company
        // Relacionamento de muitos para muitos
        return $this->belongsToMany(City::class, 'company_city');
    }
}

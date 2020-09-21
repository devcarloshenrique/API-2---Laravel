<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    public function oneToOne()
    {
        $country = Country::find(1);

        // Quando utilizamos o where precisamos usar o get(), porém o get retorna um array, sendo necessário utilizar o first() que retorna o primeiro valor do array, o first só é recomendado usar quando eu sei que minha função retorna apenas um valor
        //$country = Country::where('name', 'Brasil')->get()->first();


        // $country->location faz referencia ao location criado na Model
        $location = $country->location;

        // Também podemos chamar o location em formato de metodo, uma das vantagens de utilizar o get é pq você consegue fazer um filtro com o where
        //$location = $country->location()->get()->first();

        echo "País: {$country->name}";
        echo "<hr>Latitude: {$location->latitude}</hr> <br>";
        echo "Logitude: {$location->longitude}</hr>";
    }
}

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

    public function oneToOneInverse()
    {
        $latitude = 60;
        $longitude = 22;

        $location = Location::where('latitude', $latitude)
            ->where('longitude', $longitude)
            ->get()
            ->first();

        $country = $location->country;
        //$country = $location->country()->get()->first();

        echo $country->name;

        echo "<br><br>";

        echo $location;
    }

    public function oneToOneInsert()
    {
        $dataForm = [
            'name' => 'Teste6',
            'latitude' => '890',
            'longitude' => '098',
        ];

        $country = Country::create($dataForm);

        /**
         * 1- Cadastrando na tabela Location que possui uma coluna relacionada com id de Country
         * Country PK id || Location FK country_id
         */

        //$dataForm['country_id'] = $country->id;
        //$location = Location::create($dataForm);

        /**
         * 2 - Podemos Cadastrar dessa forma também
         */

        /* $location = new Location;

        $location->latitude = $dataForm['latitude'];
        $location->longitude = $dataForm['latitude'];
        $location->country_id = $country->id;
        $location->save();
        */

        /**
         * 3 - Podemos Cadastrar dessa forma também
         */

        $location = $country->location()->create($dataForm);

        //var_dump($location);

        return response()->json(['data' => $location]);
    }
}

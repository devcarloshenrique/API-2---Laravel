<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
        $keySearch = 'a';
        //Graças ao with('states') na mesma consulta é possível pegar todos os dados relacionados ao relacionamento definido na função states e retornar em uma única consulta
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();



        foreach ($countries as $country) {
            echo "<b> {$country->name} </b> <br>";

            $states = $country->states;

            foreach ($states as $state) {
                echo "<br>{$state->initials} - {$state->name}";
            }

            echo "<br><br>";
        }


        $country = Country::where('name', 'Brasil')->get()->first();

        /**
         * Chamando em fomato de  atributo
         */

        //$states = $country->states;

        /**
         * Chamando em fomato de  por metodo
         */

        $states = $country->states()->where('initials', 'CE')->get();


        // É necessário fazer um foreach pois é retornado mais de um valor
        foreach ($states as $state) {
            // echo "<hr> {$state->initials} - {$state->name} <br>";
        }
    }

    public function manyToOne()
    {
        $stateName = 'São Paulo';
        $state = State::where('name', $stateName)->get()->first();

        echo "<b> {$state->name} </b> <br>";

        $country = $state->country;

        echo "<hr> {$country->name} ";
    }

    public function oneToManyTwo()
    {
        $keySearch = 'a';
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();

        foreach ($countries as $country) {
            echo "<b> {$country->name} </b> <br>";

            $states = $country->states;

            foreach ($states as $state) {
                echo "<br>{$state->initials} - {$state->name}: ";

                foreach ($state->cities as $city) {
                    echo "{$city->name} , ";
                }
            }

            echo "<br><br>";
        }
    }
}

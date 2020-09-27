<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
        $city = City::where('name', 'Caucaia')->get()->first();

        echo "<br> {$city->name} </b> <br>";

        $companies = $city->companies;

        foreach ($companies as $company) {
            echo "{$company->name}, ";
        }
    }

    public function manyToManyInverse()
    {
        $company = Company::where('name', 'Abaeté Linhas Aéreas')->get()->first();

        echo "<br> {$company->name} </b> <br>";
        $cities = $company->cities;

        foreach ($cities as $city) {
            echo "{$city->name}, ";
        }
    }

    public function manyToManyInsert()
    {
        $dataForm = [1, 2, 3];

        $company = Company::find(1);

        echo "<br> {$company->name} </b> <br>";

        // Vinculos de ManyToMany

        // Attach incrementa os items
        // $company->cities()->attach($dataForm);

        // Sync sincroniza os items
        $company->cities()->sync($dataForm);


        // Removendo um registro da tabela company_city onde a company id = 1 e city_id = 2
        // Também pode ser passado um array de valores como parametro
        // $company->cities()->detach([2]);

        $cities = $company->cities;

        foreach ($cities as $city) {
            echo "{$city->name}, ";
        }
    }
}

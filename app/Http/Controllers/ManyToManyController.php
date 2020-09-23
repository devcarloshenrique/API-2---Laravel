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
}

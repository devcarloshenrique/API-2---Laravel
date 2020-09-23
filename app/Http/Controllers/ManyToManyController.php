<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

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
}

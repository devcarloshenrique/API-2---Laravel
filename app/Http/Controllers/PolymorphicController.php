<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Comment;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
    }

    public function polymorphicInsert()
    {

        // Cadastro comentario City

        /**
        $city = City::where('name', 'Fortaleza')->get()->first();

        echo $city->name;

        $comment = $city->comments()->create([
            'description' => "New Comment {$city->name}" . date('YmdHis'),
        ]);

        var_dump($comment);

         */

        // Cadastro comentario State

        /*
        $state = State::where('name', 'Acre')->get()->first();

        echo $state->name;

        $comment = $state->comments()->create([
            'description' => "New Comment {$state->name}" . date('YmdHis'),
        ]);

        var_dump($comment);
        */

        // Cadastro comentario country

        /*
        $country = Country::where('name', 'Brasil')->get()->first();

        echo $country->name;

        $comment = $country->comments()->create([
            'description' => "New Comment {$country->name}" . date('YmdHis'),
        ]);

        var_dump($comment);
        */
    }
}

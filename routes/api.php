<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('one-to-one', 'OneToOneController@oneToOne');

Route::get('one-to-one-inverse', 'OneToOneController@oneToOneInverse');

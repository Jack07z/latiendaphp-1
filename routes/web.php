<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('paises' , function(){
    $paises = [
        "Colombia" => [
           "cap" => "Bogota",
           "mon" => "Peso Colombiano",
           "pob" => 51.6,
           "ciu" => [
               "Cali",
               "Medellin",
               "Barranquilla"
           ]
       ],
       "España" =>[
           "cap" => "Madrid",
           "mon" => "Euro",
           "pob" => 47.35,
           "ciu" => [
               "Barcelona"
           ]
       ],
        "Argentina" => [
            "cap" => "Buenos Aires",
            "mon" => "Peso Argentino",
            "pob" => 45.3,
            "ciu" =>[
                "Mar del plata",
                "Rosario"
            ]
        ]
   ];


   //mostrar vista de paises
   return view("paises")
    ->with("paises" , $paises);

});
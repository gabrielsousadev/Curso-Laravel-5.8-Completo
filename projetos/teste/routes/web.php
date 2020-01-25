<?php

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

Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome)
{
    echo "ola, bem vindo, $nome $sobrenome";
});

Route::get('/seunome/{nome?}', function($nome=null)
{   
    if(isset($nome))
        return "ola, bem vindo, $nome";
        return "Voce nao digitou nenhum nome";  
});

Route::get('/rotacomregras/{nome}/{n}', function($nome, $n)
{   
    for ($i=0; $i < $n; $i++) { 
        echo "ola, bem vindo, $nome <br>";
    }
})  ->where('nome','[A-Za-z]+')
    ->where('n','[0-9]+');

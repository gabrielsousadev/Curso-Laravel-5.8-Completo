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

use Facade\FlareClient\View;
use Illuminate\Http\Request;

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

Route::prefix('/aplicacao')->group(function()
{
    Route::get('/', function()
    {   
        return View('app');
    })->name('app');

    Route::get('/user', function()
    {   
        return View('user');
    })->name('app.user');

    Route::get('/profile', function()
    {   
        return View('profile');
    })->name('app.profile');
});

Route::get('/produtos', function() 
{
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressora</li>";
    echo "<li>Mouse</li>";
    echo "<ol>";
 
})->name('meusprodutos');

//Route::redirect('todosprodutos1', 'produtos', 301);

Route::get('todosprodutos2', function ()
{
    return redirect()->route('meusprodutos');
});

Route::post('/requisicoes', function (Request $request)
{
    return 'Hello POST';    
});

Route::delete('/requisicoes', function (Request $request)
{
    return 'Hello DELETE';    
});

Route::put('/requisicoes', function (Request $request)
{
    return 'Hello PUT';    
});

Route::patch('/requisicoes', function (Request $request)
{
    return 'Hello PATCH';    
});

Route::options('/requisicoes', function (Request $request)
{
    return 'Hello OPTIONS';    
});

Route::get('/requisicoes', function (Request $request)
{
    return 'Hello GET';    
});
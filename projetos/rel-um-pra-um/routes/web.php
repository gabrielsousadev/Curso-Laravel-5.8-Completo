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

use App\Cliente;
use App\Endereco;

Route::get('/clientes', function () 
{
    $clientes = Cliente::all();
    foreach ($clientes as $c)
    {
        echo "<p>ID: ". $c->id . "</p>";
        echo "<p>Nome: ". $c->nome . "</p>";
        echo "<p>Telefone: ". $c->telefone . "</p>";  
        //$e = Endereco::where('cliente_id', $c->id)->first();  
        echo "<p>Rua: ". $c->rua . "</p>";
        echo "<p>Número: ". $c->numero . "</p>";    
        echo "<p>Bairro: ". $c->bairro . "</p>";
        echo "<p>Cidade: ". $c->cidade . "</p>";   
        echo "<p>UF: ". $c->uf . "</p>";     
        echo "<p>CEP: ". $c->cep . "</p>";
        echo "<hr>";
    }
});

Route::get('/enderecos', function () 
{
    $enderecos = Endereco::all();
    foreach ($enderecos as $e)
    {
        echo "<p>ID_cliente: ". $e->cliente_id . "</p>";
        echo "<p>Nome: ". $e->cliente->nome . "</p>";
        echo "<p>Telefone: ". $e->cliente->telefone . "</p>";  
        echo "<p>Rua: ". $e->rua . "</p>";
        echo "<p>Número: ". $e->numero . "</p>";    
        echo "<p>Bairro: ". $e->bairro . "</p>";
        echo "<p>Cidade: ". $e->cidade . "</p>";   
        echo "<p>UF: ". $e->uf . "</p>";     
        echo "<p>CEP: ". $e->cep . "</p>";
        echo "<hr>";
    }
});

Route::get('/inserir', function()
{
    $novoCliente = new Cliente();
    $novoCliente->nome = "Joao silva";
    $novoCliente->telefone = "11 2222-3333";
    $novoCliente->save();

    $novoEndereco = new Endereco();
    $novoEndereco->rua = "Av. Atlantica";
    $novoEndereco->numero = 300;
    $novoEndereco->bairro = "Paulista";
    $novoEndereco->cidade = "Sao Paulo";
    $novoEndereco->uf = "SP";
    $novoEndereco->cep = "22222-555";

    $novoCliente->endereco()->save($novoEndereco);

    $novoCliente = new Cliente();
    $novoCliente->nome = "Maria silva";
    $novoCliente->telefone = "11 2222-4444";
    $novoCliente->save();

    $novoEndereco = new Endereco();
    $novoEndereco->rua = "Av. Brasil";
    $novoEndereco->numero = 1500;
    $novoEndereco->bairro = "Rio Grande";
    $novoEndereco->cidade = "Bahia";
    $novoEndereco->uf = "BH";
    $novoEndereco->cep = "22222-555";

    $novoCliente->endereco()->save($novoEndereco);
});

Route::get('/clientes/json', function()
{
    //$clientes = Cliente::all(); //Lazy Loading
    $clientes = Cliente::with(['endereco'])->get(); //Eager Loading
    return $clientes->toJson();
});

Route::get('/enderecos/json', function()
{
    //$enderecos = Endereco::all(); //Lazy Loading
    $enderecos = Endereco::with(['cliente'])->get(); //Eager Loading
    return $enderecos->toJson();
});
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

class ControladorProduto extends Controller
{

    public function indexView()
    {
        return view('produtos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $prods = Produto::all();
        return $prods->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $novoProduto = new Produto();
        $novoProduto->nome = $request->input('nome');
        $novoProduto->preco = $request->input('preco');
        $novoProduto->estoque = $request->input('estoque');
        $novoProduto->categoria_id = $request->input('categoria_id');
        $novoProduto->save();
        return json_encode($novoProduto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prod = Produto::find($id);
        if(isset($prod))
        {
            return json_encode($prod);
        }

        return response('Produto não encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prod = Produto::find($id);
        if(isset($prod))
        {
            $prod->nome = $request->input('nome');
            $prod->preco = $request->input('preco');
            $prod->estoque = $request->input('estoque');
            $prod->categoria_id = $request->input('categoria_id');
            $prod->save();
            return json_encode($prod);
        }

        return response('Produto não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produto::find($id);
        if(isset($prod))
        {
            $prod->delete();
            return response('OK', 200);
        }

        return response('Produto não encontrado', 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Article;
use App\Http\Requests\CategoriaStoreRequest;
use App\Http\Requests\CategoriaUpdateRequest;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();

        return $categorias;
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
    public function store(CategoriaStoreRequest $request)
    {
        $data = $request->only(['categoria']);

        $categoria = \App\Categoria::create($data);

        return response(
            [
                'status' => 201,
                'data' => $categoria,
                'msg' => 'categoria adicionada com sucesso'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return $categoria;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaUpdateRequest $request, Categoria $categoria)
    {
        $data = $request->only(['categoria']);
        $categoria->categoria= $data['categoria'];

        $categoria->save();

        return response(
            [
                'status' => 200,
                'data' => $categoria,
                'msg' => 'categoria editada com sucesso'
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return response(
            [
                'status' => 200,
                'data' => $categoria,
                'msg' => 'categoria apagada'
            ],200);
    }

    public function getCategoriaArticles(Categoria $categoria) {
        $data = Article::with('categoria')->get()->where('categoria', $categoria);

        return response(
            [
                'status' => 200,
                'data' => $data,
                'msg' => 'ok'
            ],200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleUpdateRequest;
use App\Http\Requests\ArticleStoreRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return $articles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleStoreRequest $request)
    {
        $data = $request->only(['titulo', 'data', 'descricao', 'user_id', 'categoria_id', 'artigo_imagem']);

        if(!$path = $request->file('artigo_imagem')){
            $data['artigo_imagem'] = 'articleImages/default.jpg';
        }else{
            $path = $request->file('artigo_imagem')->store('articleImages', 'public');
            $data['artigo_imagem'] = $path;
        }


        $article = \App\Article::create($data);

        return response(
            [
                'status' => 201,
                'data' => $article,
                'msg' => 'article adicionado com sucesso'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

        return $article;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, Article $article)
    {
        //$request->only(['titulo', 'data', 'descricao']);

        $data = $request->only(['titulo', 'data', 'descricao', 'user_id', 'categoria_id', 'artigo_imagem']);

        $path = $request->file('artigo_imagem')->store('articleImages', 'public');
        $data['artigo_imagem'] = $path;

        if($request->only(['titulo'])){
            $article->titulo = $data['titulo'];
        }

        if($request->only(['data'])){
            $article->data = $data['data'];
        }

        if($request->only(['descricao'])){
            $article->descricao = $data['descricao'];
        }

        if($request->only(['user_id'])){
            $article->user_id = $data['user_id'];
        }

        if($request->only(['categoria_id'])){
            $article->categoria_id = $data['categoria_id'];
        }

        if($request->file(['artigo_imagem'])){
            $article->artigo_imagem = $data['artigo_imagem'];
        }

        $article->save();

        return response(
            [
                'status' => 200,
                'data' => $article,
                'msg' => 'article editado com sucesso'
            ],200);

        /*$validator = Validator::make($data,
            [
                'titulo' => 'required|max:50',
                'data' => 'required',
                'descricao' => 'required|max:300'

            ],
            [
                'titulo.required' => 'titulo obrigatório',
                'data.required' => 'data obrigatório',
                'descricao.required' => 'descricao obrigatório'
            ]);

        if($validator->fails()){
            return response(
                [
                    'status' => 1,
                    'data' => $validator->errors()->all(),
                    'msg' => 'error'
                ]
            );
        }else{

            $article->titulo = $data['titulo'];
            $article->data = $data['data'];
            $article->descricao = $data['descricao'];
            $article->save();

            return response(
                [
                    'status' => 0,
                    'data' => $article,
                    'msg' => 'ok'
                ]
            );
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return response(
            [
                'status' => 200,
                'data' => $article,
                'msg' => 'artigo apagado'
            ],200);
    }


}

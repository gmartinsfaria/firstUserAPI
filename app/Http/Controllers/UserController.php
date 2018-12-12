<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return $users;
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
    public function store(UserStoreRequest $request) //permite fazer um post
    {
        $data = $request->only(['name', 'email', 'password', 'profile_image']);

        if(!$request->file(['profile_image'])){
            $data['profile_image'] = 'userImages/predefinido.jpg';
        }else{
            $path = $request->file('profile_image')->store('userImages', 'public');
            $data['profile_image'] = $path;
        }


        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        return response(
            [
                'status' => 201,
                'data' => $user,
                'msg' => 'user adicionado com sucesso'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    /*public function edit(User $user)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        //
        $data = $request->only(['name', 'email', 'password', 'profile_image']);

        $path = $request->file('profile_image')->store('userImages', 'public');
        $data['profile_image'] = $path;


        if($request->only(['name'])){
            $user->name = $data['name'];
        }

        if($request->only(['email'])){
            $user->email = $data['email'];
        }

        if($request->only(['password'])){
            $user->password = bcrypt($data['password']);
        }

        if($request->file(['profile_image'])){
          $user->profile_image = $data['profile_image'];
        }

        $user->save();

        return response(
            [
                'status' => 200,
                'data' => $user,
                'msg' => 'user editado com sucesso'
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response(
            [
                'status' => 200,
                'data' => $user,
                'msg' => 'utilizador apagado'
            ],200);
    }


    public function getArticles(User $user) {
        $data = Article::with('user')->get()->where('user', $user);

        return response(
            [
                'status' => 200,
                'data' => $data,
                'msg' => 'ok'
            ],200);
    }

}

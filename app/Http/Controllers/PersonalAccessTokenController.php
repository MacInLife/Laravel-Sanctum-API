<?php

namespace App\Http\Controllers;

use App\PersonalAccessToken;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PersonalAccessTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return PersonalAccessToken::with('user')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //
        $request->validate([
            'user' => 'required|exist:users.id',
            'name' => 'required'
        ]);
        $token = new PersonalAccessToken;
        $token->name = $request->name;
        $token->tokenable_type = "App\User";
        $token->tokenable_id = $request->user;
        $token->token = Str::random(30);
        $token->abilities = ["*"];
        $token->save();
        return response(null, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return PersonalAccessToken::findOrFail($id);
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
        //
        $request->validate([
            'name' => 'required'
        ]);

        $token = PersonalAccessToken::findOrFail($id);
        $token->name = $request->name;
        $token->save();

        return response(null, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $token = PersonalAccessToken::findOrFail($id);
        $token->delete();

        return response(null, 200);
    }
}

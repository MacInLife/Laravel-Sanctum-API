<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiTokenController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'abilities' => 'required'
        ]);
        //BDD token chiffé
        $token = $request->user()->createToken($request->name, $request->abilities);

        //Token non chiffré
        return back()->withStatus("Token created : {$token->plainTextToken}");
       // ou  $token = $Auth::user()->createToken('token-name');
        dd($token);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    //
    public function index(Request $request)
    {
      if($request->user()->tokenCan('view')){
          return response(['error' => 'You do not have the rights to enter here'], 401);
      }
      return response()->json(['repositories' =>[
          'airbnb-antique' => "https://github.com/MacInLife/AirBnb_Antique",
          'laravel-facebook' => "https://github.com/MacInLife/AirBnb_Antique",
      ]]);
    }

    public function store(Request $request)
    {
        if($request->user()->tokenCan('create')){
            return response(['error' => 'You do not have the rights to enter here'], 401);
        }
      //dd($request->user());
      return response()->json(['message' => 'Repositories Created']);
    }
}

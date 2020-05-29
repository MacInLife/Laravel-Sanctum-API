<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    //
    public function index(Request $request)
    {
      //dd($request->user());
      return response()->json(['Message ']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TitulosController extends Controller
{
    public function index(Request $request)
    {       

        return view('edudata.titulos.index');
    }
}

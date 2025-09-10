<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResidenciaController extends Controller
{
    public function index(Request $request)
    {       

        return view('edudata.residencia.index');
    }
}

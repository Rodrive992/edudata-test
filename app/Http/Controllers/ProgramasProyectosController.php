<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramasProyectosController extends Controller
{
    public function index(Request $request)
    {       

        return view('edudata.programas.index');
    }
}

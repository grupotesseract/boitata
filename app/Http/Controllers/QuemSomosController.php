<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuemSomosController extends Controller
{
    /**
     * Página Quem Somos
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quem-somos.show');
    }
}

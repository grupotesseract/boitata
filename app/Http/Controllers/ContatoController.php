<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnviaEmailContatoRequest;

class ContatoController extends Controller
{
    /**
     * Serve a view com o form de contato
     *
     */
    public function getContato()
    {
        return view('contato.show');
    }

    /**
     * Recebe por post o contato e envia por email
     *
     * @param EnviaEmailContatoRequest $request
     */
    public function postContato(EnviaEmailContatoRequest $request)
    {

        dd('aqui', $request->all());
        return null;
    }
    

    
}

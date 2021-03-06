<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnviaEmailContatoRequest;
use App\Mail\EmailContato;
use Flash;
use Mail;

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
        Mail::send(new EmailContato($request->all()));
        Flash::success('Seu contato foi enviado com sucesso!');
        return redirect()->back();
    }
    

    
}

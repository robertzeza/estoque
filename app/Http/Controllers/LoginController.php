<?php

namespace estoque\Http\Controllers;

use Request;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
        $credenciais = Request::only('email','password');
        if(Auth::attempt($credenciais))
        {
            return "usuario ". Auth::user()->name ." Logado com sucesso";
        }
        return "As credenciais não são válidas";
    }

}

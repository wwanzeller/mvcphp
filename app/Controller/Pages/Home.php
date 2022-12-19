<?php

namespace App\Controller\Pages;

//DEPENDÊNCIAS DO PROJETO
use App\Utils\View;

class Home
{
    /**
     * Método responsável por retornar o conteúdo (view) da home.
     *
     * @return String
     */
    public static function getHome() : String
    {
        return View::render('pages/home', [
            'name' => 'Wenderson Wanzeller',
            'description' => 'Endereço Linkedin: https://www.linkedin.com/in/wenderson-wanzeller'
        ]);
    }
}

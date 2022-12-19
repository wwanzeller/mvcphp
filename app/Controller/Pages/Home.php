<?php

namespace App\Controller\Pages;

//DEPENDÊNCIAS DO PROJETO
use App\Utils\View;

class Home extends Page
{
    /**
     * Método responsável por retornar o conteúdo (view) da home.
     *
     * @return String
     */
    public static function getHome() : String
    {
        //VIEW DA HOME
        $content =  View::render('pages/home', [
            'name' => 'Wenderson Wanzeller',
            'description' => 'Endereço Linkedin: https://www.linkedin.com/in/wenderson-wanzeller'
        ]);

        //VIEW DA PÁGINA
        return parent::getPage('Página Principal', $content);
    }
}

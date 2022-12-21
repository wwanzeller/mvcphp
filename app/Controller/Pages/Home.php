<?php

namespace App\Controller\Pages;

//DEPENDÊNCIAS DO PROJETO
use App\Utils\View;
use App\Model\Entity\Organization;

class Home extends Page
{
    /**
     * Método responsável por retornar o conteúdo (view) da home.
     *
     * @return String
     */
    public static function getHome() : String
    {
        //ORGANIZAÇÃO
        $obOrganization = new Organization;
        
        //VIEW DA HOME
        $content =  View::render('pages/home', [
            'name'        => $obOrganization->name,
        ]);

        //VIEW DA PÁGINA
        return parent::getPage('HOME', $content);
    }
}

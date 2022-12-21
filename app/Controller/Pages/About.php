<?php

namespace App\Controller\Pages;

//DEPENDÊNCIAS DO PROJETO
use App\Utils\View;
use App\Model\Entity\Organization;

class About extends Page
{
    /**
     * Método responsável por retornar o conteúdo (view) da pagina sobre.
     *
     * @return String
     */
    public static function getAbout() : String
    {
        //ORGANIZAÇÃO
        $obOrganization = new Organization;
        
        //VIEW DA HOME
        $content =  View::render('pages/about', [
            'name'        => $obOrganization->name,
            'description' => $obOrganization->description,
            'site'        => $obOrganization->site
        ]);

        //VIEW DA PÁGINA
        return parent::getPage('SOBRE > MVC', $content);
    }
}

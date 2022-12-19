<?php

namespace App\Controller\Pages;

class Home
{
    /**
     * Método responsa´vel por retornar o conteúdo (view) da home.
     *
     * @return String
     */
    public static function getHome() : String
    {
        return 'Olá mundo!';
    }
}

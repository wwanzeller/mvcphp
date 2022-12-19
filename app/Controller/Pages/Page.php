<?php

namespace App\Controller\Pages;

//DEPENDÊNCIAS DO PROJETO
use App\Utils\View;

class Page
{
    /**
     * Método responsável por renderizer o topo da página.
     *
     * @return String
     */
    public static function getHeader() : String
    {
        return View::render('pages/header');
    }

     /**
     * Método responsável por renderizer o rodapé da página.
     *
     * @return String
     */
    public static function getFooter() : String
    {
        return View::render('pages/footer');
    }

    /**
     * Método responsável por retornar o conteúdo (view) da página de layout.
     * @param String $title
     * @param String $content
     * @return String
     */
    public static function getPage(String $title, String $content) : String
    {
        return View::render('pages/page', [
            'title'   => $title,
            'header'  => self::getHeader(),
            'content' => $content,
            'footer'  => self::getFooter()
        ]);
    }
}

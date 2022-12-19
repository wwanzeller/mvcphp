<?php

namespace App\Utils;

class View
{
    /**
     * Método responsável por retornar o conteúdo de uma view.
     *
     * @param String $view
     * @return String
     */
    private static function getContentView(String $view) : String
    {
        $file = __DIR__ . '/../../resources/view/'.$view.'.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Método responsável por retornar o conteúdo renderizado de uma view.
     *
     * @param String $view
     * @param Array $vars (string/numeric)
     * @return String
     */
    public static function render(String $view, Array $vars = []) : String
    {
        //CONTEÚDO DA VIEW
        $contentView = self::getContentView($view);

        //CHAVES DO ARRAY DE VARIÁVEIS
        $keys = array_keys($vars);
        $keys = array_map(function ($item){
            return "{{{$item}}}";
        }, $keys);

        return str_replace($keys, array_values($vars), $contentView);
    }
}

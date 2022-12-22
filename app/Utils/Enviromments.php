<?php

namespace App\Utils;

class Enviromments{

   /**
    * Método responsável por carregar as variáveis de ambiente do projeto
    * @param String $dir
    */
   public static function load(String $dir)
    {
        //VERIFICA SE O ARQUIVO .ENV EXISTE
        if(!file_exists($dir.'/.env'))
        {
            return false;
        }

        //DEFINE AS VARIÁVEIS DE AMBIENTE
        $lines = file($dir.'/.env');
        foreach($lines as $line)
        {
            putenv($line);
        }
    }

}
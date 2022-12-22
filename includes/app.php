<?php
//CARREGA AUTOLOAD DO COMPOSER
require __DIR__.'/../vendor/autoload.php';

//CARREGA AS DEPENDÊNCIAS
use App\Utils\{
                View, 
                Enviromments
            };

//CARREGA VARIÁVEIS DE AMBIENTE
Enviromments::load(__DIR__.'/../');

//DEFINE A CONSTANTE DA URL DO PROJETO
define('URL', getenv('URL'));

//DEFINE O VALOR PDADRÃO DAS VARIÁVEIS
View::init([
    'URL' => URL
]);

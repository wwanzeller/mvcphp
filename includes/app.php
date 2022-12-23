<?php
//CARREGA AUTOLOAD DO COMPOSER
require __DIR__.'/../vendor/autoload.php';


//CARREGA AS DEPENDÊNCIAS
use App\DataBaseManager\Database;
use App\Utils\{
                View, 
                Enviromments
            };

//CARREGA VARIÁVEIS DE AMBIENTE
Enviromments::load(__DIR__.'/../');

//CONFIG DATABASE CLASS
Database::config(
    getenv('DB_HOST'),
    getenv('DB_DATABASE'),
    getenv('DB_USERNAME'),
    getenv('DB_PASSWORD'),
    getenv('DB_PORT')
);

//DEFINE A CONSTANTE DA URL DO PROJETO
define('URL', getenv('URL'));

//DEFINE O VALOR PDADRÃO DAS VARIÁVEIS
View::init([
    'URL' => URL
]);

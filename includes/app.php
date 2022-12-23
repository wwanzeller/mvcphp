<?php
//CARREGA AUTOLOAD DO COMPOSER
require __DIR__.'/../vendor/autoload.php';


//CARREGA AS DEPENDÊNCIAS
use App\Utils\{View,Enviromments};
use App\DataBase\Db;

//CARREGA VARIÁVEIS DE AMBIENTE
Enviromments::load(__DIR__.'/../');

//CONFIG DATABASE CLASS
Db::config(
    getenv('DB_HOST'),
    getenv('DB_DATABASE'),
    getenv('DB_USERNAME'),
    getenv('DB_PASSWORD'),
    getenv('DB_PORT')
);

//DEFINE A CONSTANTE DA URL DO PROJETO
define('URL', getenv('URL'));

//DEFINE VALOR PARA UTILIZAÇÃO GLOBAL DE VARIÁVEIS
View::init([
    'URL' => URL
]);

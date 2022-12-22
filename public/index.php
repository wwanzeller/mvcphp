<?php

require __DIR__.'/../vendor/autoload.php';

use App\Http\Router;
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

//INICIA O ROUTER
$obRouter = new Router(URL);

//INCLUI AS ROTAS DE PÁGINAS
include __DIR__.'/../routes/pages.php';


//IMPRIME O RESPONSE DA ROTA
$obRouter->run()->sendResponse();
<?php

require __DIR__.'/../vendor/autoload.php';

use App\Http\{Router};
use App\Controller\Pages\Home;
use App\Utils\View;

define('URL', 'http://localhost');

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
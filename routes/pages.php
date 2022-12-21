<?php

use App\Http\Response;
use App\Controller\Pages;

//ROTA HOME
$obRouter->get('/', [
    function(){
        return new Response(200, Pages\Home::getHome());
    }
]);

//ROTA SOBRE
$obRouter->get('/sobre', [
    function(){
        return new Response(200, Pages\About::getAbout());
    }
]);

//ROTA DINÂMICA
$obRouter->get('/pagina/{idPagina}/{consultar}', [
    function($idPagina, $consultar){
        return new Response(200, 'Página ' .$idPagina . $consultar);
    }
]);

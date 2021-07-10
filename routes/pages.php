<?php

use \App\Http\Response;
use \App\Controllers\Pages;

$router->get("/", [
  function() {
    return new Response(200, Pages\Home::getHome());
  }
]);

$router->get("/sobre", [
  function() {
    return new Response(200, Pages\About::getAbout());
  }
]);

$router->get("/pagina/{idPagina}/{acao}", [
  function($idPagina, $acao) {
    return new Response(200, "Página $idPagina | Ação $acao");
  }
]);

<?php
require "controllers/FilmesController.php";

$rota = $_SERVER["REQUEST_URI"]; // IDENTIFICA A URL CHAMADA
$metodo = $_SERVER["REQUEST_METHOD"]; // IDENTIFICA A URL CHAMADA

if ($rota === "/") {
    require "views/galeria.php";
    exit();
}

if ($rota === "/novo") {
    if ($metodo == "GET") require "views/cadastrar.php";
    if ($metodo == "POST") {
        $controller = new FilmesControoler();
        $controller->save($_REQUEST); // $_REQUEST - armazena os dados enviados do form
    }
    exit();
}

if (substr($rota, 0, strlen("/favoritar")) === "/favoritar") {
    $controller = new FilmesControoler();
    $controller->favorite(basename($rota)); // o basename vai retirar todo o caminho anterior ao ultimo nome, ficando apenas o id q é oq queremos
    exit();
}

if (substr($rota, 0, strlen("/filmes")) === "/filmes") {
    if ($metodo == "GET") require "views/cadastrar.php";
    if ($metodo == "DELETE") {
        $controller = new FilmesControoler();
        $controller->delete(basename($rota)); // $_REQUEST - armazena os dados enviados do form
    }
    exit();
}

require "views/404.php";
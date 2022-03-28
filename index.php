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

require "views/404.php";


/* switch ($rota) {
    case "/":
        require "views/galeria.php";
        break;

    case "/novo":   //  tratamento para apenas acessar a página de cadastro e então quando estiver na mesma página se acontecer o POST irá redirecionar e executar a rotina
        if($metodo == "GET") require "views/cadastrar.php";
        if($metodo == "POST") 
        {
            $controller = new FilmesControoler();
            $controller->save($_REQUEST); // $_REQUEST - armazena os dados enviados do form
        }
        break;
    
    default:
        require "views/404.php";
        break;
} */
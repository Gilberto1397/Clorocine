<?php

$bd = new SQLite3("./db/filmes.db"); // nome do DB

$sql = "DROP TABLE IF EXISTS filmes";

if ($bd->exec($sql)) 
    echo "\nTabela fimes apagada\n";


$sql = "CREATE TABLE filmes(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR (200) NOT NULL,
    poster VARCHAR (200),
    sinopse TEXT,
    nota DECIMAL (2,1),
    favorito INT DEFAULT 0
    )
";

if ($bd->exec($sql)) 
    echo "\nTabela filmes criada\n";
else 
    echo "\nErro ao criar tabela filmes\n";

/* $sql = "INSERT INTO filmes (id, titulo, poster, sinopse, nota) VALUES (
    0,
    'Transformers',
    'https://www.themoviedb.org/t/p/w300_and_h450_bestv2/6eehp9I54syN3x753XMqjKz8M3F.jpg',
    'I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.',
    9.7
    )"; */
// primeiro id inserido como 0 para que o próprio DB coloque 1

/* if ($bd->exec($sql)) 
    echo "\nFilmes inseridos com sucesso\n";
else 
    echo "\nerro ao inserir filmes\n";

$sql = "INSERT INTO filmes (id, titulo, poster, sinopse, nota) VALUES (
    null,
    'Transformers2',
    'https://www.themoviedb.org/t/p/w300_and_h450_bestv2/6eehp9I54syN3x753XMqjKz8M3F.jpg',
    'Robos gigantes 2',
    6.5
    )"; */
// primeiro id inserido como 0 para que o próprio DB coloque 1

/* if ($bd->exec($sql)) 
    echo "\nFilmes inseridos com sucesso\n";
else 
    echo "\nerro ao inserir filmes\n"; */


?>
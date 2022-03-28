<?php

$bd = new SQLite3("./db/filmes.db"); // nome do DB

$sql = "ALTER TABLE filmes ADD COLUMN favorito INT DEFAULT 0";

if ($bd->exec($sql)) 
    echo "\nTabela fimes alterada com sucesso\n";
else
    echo "\nErro ao alterar tabela\n";
    



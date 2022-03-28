<?php
require_once "repository\Conexao.php";

/* $sql = "INSERT INTO filmes (id, titulo) VALUES (
    null, :titulo)";

$stmt = Conexao::criar()->prepare($sql);
$stmt->bindValue(":titulo", "Testando sql"); // uso do obj em cada bind equivalente
var_dump($stmt->execute()); */
//var_dump($stmt);

/* $sql = "UPDATE filmes SET favorito = NOT favorito WHERE id = 1";
$filmes = (new Conexao())->criar()->exec($sql);

var_dump($filmes);
 */

$filmesLista = [];

        $sql = "SELECT * FROM filmes";
        $filmes = Conexao::criar()->query($sql); //query sendo usado por questão de busca apenas - $rs = abreviação de "result set"
        while ($filme = $filmes->fetchObject())// o objeto $filme trará o objeto com as chaves sendo o nome das colunas do db e seus respectivos valores
        {
            array_push($filmesLista, $filme);
        }
        echo json_encode($filmesLista);
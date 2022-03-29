<?php
require_once "repository/Conexao.php";
//require_once "db\bd_up.php";
//classe de manipulação do DB

class FilmesRepositoryPDO
{
    protected $conexao; 

    public function __construct()
    {
        $this->conexao = Conexao::criar();
    }

    public function listarTodos(): array
    {
        $filmesLista = [];

        $sql = "SELECT * FROM filmes";
        $filmes = $this->conexao->query($sql); //query sendo usado por questão de busca apenas - $rs = abreviação de "result set"
        if(!$filmes) return false; // Casonão haja resultados trará false
        while ($filme = $filmes->fetchObject())// o objeto $filme trará o objeto com as chaves sendo o nome das colunas do db e seus respectivos valores
        {
            array_push($filmesLista, $filme);
        }
        return $filmesLista;

    }

    public function salvar(/* Filme */ $filme): bool  // sem tipo filme, pois é apenas o $_REQUEST transformado em obj
    {
        //$bd = Conexao::criar()
        //$bd = $this->conexao;

        $sql = "INSERT INTO filmes (id, titulo, poster, sinopse, nota) VALUES (
            null, :titulo, :poster, :sinopse, :nota )";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":titulo", $filme->titulo, PDO::PARAM_STR); // uso do obj em cada bind equivalente
        $stmt->bindValue(":poster", $filme->poster_link, PDO::PARAM_STR);
        $stmt->bindValue(":sinopse",$filme->sinopse, PDO::PARAM_STR);
        $stmt->bindValue(":nota", $filme->nota, PDO::PARAM_STR);
        return $stmt->execute();
        
          
    }

    public function favoritar(int $id)
    {
        $sql = "UPDATE filmes SET favorito = NOT favorito WHERE id = :id"; // Atualize o favorito com o valor contrário no id especificado
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT); // uso do obj em cada bind equivalente
                
        if ($stmt->execute()) {
            return "ok";
        }  else {
            return "erro";
        }
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM filmes WHERE id = :id"; // Atualize o favorito com o valor contrário no id especificado
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT); // uso do obj em cada bind equivalente
                
        if ($stmt->execute()) {
            return "ok";
        }  else {
            return "erro";
        }
    }
}

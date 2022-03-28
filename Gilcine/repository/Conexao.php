<?php

//Conexão com DB - facilidade para configuração do DB

class Conexao
{
    public static function criar(): PDO    // static permitindo chamar o método sem necessitade de instanciar 
    {
        return new PDO("sqlite:db/filmes.db");
    }
}

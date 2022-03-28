<?php

//Conexão com DB - facilidade para configuração do DB

class Conexao
{
    public static function criar(): PDO    // static permitindo chamar o método sem necessitade de instanciar 
    {
        $env = parse_ini_file('.env'); // função para puxar as variáveis de ambiente
        
        $databaseType = $env["databasetype"];
        $database = $env["database"];
        $host = $env["host"];
        $pass = $env["pass"];
        $user = $env["user"];

        if ($databaseType === "mysql") {    // controle para trocar para mysql no ambiente de produção
            //$database = "host=$server;dbname=$database";
            return new PDO("mysql:host=ax6w9b9qhhozzi5e;dbname=qao3ibsa7hhgecbv.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "bsgh7kx1ud3yzc7e", "s7aenngdyqzbouh3");
            exit();
        }

        return new PDO("$databaseType:$database");

        //return new PDO("sqlite:db/filmes.db");
    }
}

<?php

// classe de exibição de mensagens através de sessão
class mensagem
{
    public static function mostrar(){ // static para não precisar da instanciação
         session_start();
         if(isset($_SESSION["msg"])){
             $msg = $_SESSION["msg"]; // armazenamento
             unset($_SESSION["msg"]);   // exclusão
            return "<script>
                M.toast({
                    html: `$msg`
                });
            </script>";
        }    
    }

}

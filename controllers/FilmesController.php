<?php
require_once "repository/FilmesRepositoryPDO.php";
require_once "model/Filme.php";
//session_start();


class FilmesControoler {

    public function index()
    {
        // método que lista os filmes armazenados
        $filmesRepository = new FilmesRepositoryPDO();
        return $filmesRepository->listarTodos();
    }

    public function save($request)   
    {
        $filmesRepository = new FilmesRepositoryPDO();
        $filme = (object) $request; // uso de objeto para deixar mais prática e relacional ao POO - transforma o $REQUEST num obj
        
        $upload = $this->savePoster($_FILES);

        if (gettype($upload) == "string") {
            $filme->poster = $upload;
        }
        /* $filmes = new Filme();
        $filmes->titulo = $request["titulo"] ; 
        $filmes->poster = $request["poster"] ;
        $filmes->sinopse = $request["sinopse"] ;
        $filmes->nota = $request["nota"] ; */ 
        
        
        if ($filmesRepository->salvar($filme)) 
        $_SESSION["msg"] = "Filme cadastrado com sucesso";
        else 
        $_SESSION["msg"] = "Erro ao cadastrar filme";    
        
        header("Location: /");
    }

    public function savePoster($file){
        // função de salvamento do poster - irá salvar o poster e retornar o caminho em que está a imagem para ser guardada no DB
        //possibilita envio de arquivo ou de imagem da web
        //possibilita tratamento dos poster diretamente nese método
        $posterDir = "imagens/posters/"; // local a salvar esses poster
        $posterPath = $posterDir . basename($file["poster_file"]["name"]); //caminho que terá esse poster / basename() Para retirar do nome do arquivo o caminho percorrido, deixando apenas o nome do arquivo
        $posterTmp = $file["poster_file"]["tmp_name"]; // nome temporário
        if (move_uploaded_file($posterTmp, $posterPath)) {
            return $posterPath;
        } else {
            return false;
        }
    }

    public function favorite(int $id){
        $filmesRepository = new FilmesRepositoryPDO();
        $result = ['success' => $filmesRepository->favoritar($id)]; // o método favoritar irá retornar true ou false
        //$result = ["success" => "ok"]; // o método favoritar irá retornar true ou false
        header('Content-type: application/json');
        echo json_encode($result);
    }
    
}
    
    /* $bd = new SQLite3("filmes.db"); // nome do DB

$titulo = $bd->escapeString($_GET["titulo"]) ; // forma para evitar sql nos input
$poster = $bd->escapeString($_GET["poster"]) ;
$sinopse = $bd->escapeString($_GET["sinopse"]) ;
$nota = $bd->escapeString($_GET["nota"]) ; */


/* $sql = "INSERT INTO filmes (id, titulo, poster, sinopse, nota) VALUES (
    null,
    '$titulo',
    '$poster',
    '$sinopse',
    $nota
    )"; */
// primeiro id inserido como 0 para que o próprio DB coloque 1

// método com prepare statement
/* $sql = "INSERT INTO filmes (id, titulo, poster, sinopse, nota) VALUES (
    null, :titulo, :poster, :sinopse, :nota )";

$stmt = $bd->prepare($sql);
$stmt->bindValue(":titulo", $titulo, SQLITE3_TEXT); 
$stmt->bindValue(":poster", $poster, SQLITE3_TEXT);
$stmt->bindValue(":sinopse", $sinopse, SQLITE3_TEXT);
$stmt->bindValue(":nota", $nota, SQLITE3_FLOAT);
 */

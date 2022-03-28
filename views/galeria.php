<?php require_once "cabecalho.php" ?>
<?php require_once "util/mensagem.php" ?>

<?php

/* $bd = new SQLite3("filmes.db");

$sql = "SELECT * FROM filmes";
$rs = $bd->query($sql); */ //query sendo usado por questão de busca apenas - $rs = abreviação de "result set"

//FORMA MANUAL DE INSERÇÃO DOS DADOS VIA ARRAY PARA POSTERIOR LEITURA COM LAÇO
/* $filme1 = [
    "titulo" => "Transformers",
    "nota" => 9.7,
    "sinopse" => "I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.",
    "poster" => "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/6eehp9I54syN3x753XMqjKz8M3F.jpg"
];

$filme2 = [
    "titulo" => "Transformers2",
    "nota" => 9.0,
    "sinopse" => "Robos gigantes 2.",
    "poster" => "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/6eehp9I54syN3x753XMqjKz8M3F.jpg"
];

$filme3 = [
    "titulo" => "Transformers3",
    "nota" => 8.0,
    "sinopse" => "Robos gigantes 3.",
    "poster" => "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/6eehp9I54syN3x753XMqjKz8M3F.jpg"
];
$filme4 = [
    "titulo" => "Transformers4",
    "nota" => 4.0,
    "sinopse" => "Robos gigantes 4",
    "poster" => "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/6eehp9I54syN3x753XMqjKz8M3F.jpg"
]; */

//$filmes = [$filme1, $filme2, $filme3, $filme4];

$controller = new FilmesControoler();
$filmes = $controller->index();
?>

<body>
    <nav class="nav-extended purple lighten-3">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li class="active"><a href="/">Galeria</a></li>
                <li><a href="/novo">Cadastrar</a></li>
            </ul>
        </div>
        <div class="nav-header center">
            <h1>CLOROCINE</h1>
        </div>
        <div class="nav-content">
            <ul class="tabs tabs-transparent purple darken-1">
                <li class="tab"><a class="active" href="#test1">Todos</a></li>
                <li class="tab"><a href="#test2">Assistidos</a></li>
                <li class="tab"><a href="#test3">Favoritos</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">

            <!-- CASO O FILMES TRAGA FALSE SEM RESPOSTAS -->
            <?php if(!$filmes) echo "<p class='card-panel red lighten-4'>Nenhum filmes cadastrado</p>" ?>

            <?php foreach ($filmes as $filme) : ?>
                <div class="col s12 m6 l3">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="<?= $filme->poster; ?>">
                            <button data-id="<?= $filme->id; ?>" class="btn-fav btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons"><?= ($filme->favorito) ? "favorite" : "favorite_border"; ?></i></button>
                        </div>
                        <div class="card-content">
                            <p class="valign-wrapper"><i class="material-icons amber-text">star</i><?= $filme->nota; ?></p>
                            <span class="card-title"><?= $filme->titulo; ?></span>
                            <p><?= $filme->sinopse; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- <?= mensagem::mostrar(); ?> -->

    <script>
        document.querySelectorAll(".btn-fav").forEach(btn => {
            btn.addEventListener("click", e => {
                const id = btn.getAttribute("data-id");
                //vai efetuar o fetch, receber a resposta, transformar em json pois virá como array - se o response na chave success for OK, o código irá seguir
                fetch(`/favoritar/${id}`)
                    .then(response => response.json())
                    .then(response => {
                        if (response.success === "ok") {
                            if (btn.querySelector("i").innerHTML === "favorite") {
                                btn.querySelector("i").innerHTML = "favorite_border";
                            } else {
                                btn.querySelector("i").innerHTML = "favorite";
                            }
                        }
                    }).catch(error => {
                        M.toast({
                            html: "Erro ao favoritar"
                        })
                    })

            });
        });
    </script>
</body>

</html>
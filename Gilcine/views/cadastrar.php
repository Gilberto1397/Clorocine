<?php require_once "cabecalho.php" ?>

<body>
  <nav class="nav-extended  purple lighten-3">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="right">
        <li><a href="/">Galeria</a></li>
        <li class="active"><a href="/novo">Cadastrar</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
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

  <div class="row">
    <div class="col s6 offset-s3">
      <div class="card ">
        <div class="card-content">
          <span class="card-title">Cadastrar Filme</span>

          <!-- input titulo -->
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
              <div class="input-field col s12">
                <input id="titulo" name="titulo" type="text" class="validate">
                <label for="titulo">Titulo do Filme</label>
              </div>
          </div>

          <!-- input sinopse -->
          <div class="row">
            <div class="row">
              <div class="input-field col s12">
                <textarea id="sinopse" name="sinopse" class="materialize-textarea"></textarea>
                <!-- AQUI O TEXTAREA PE SEMELHANTE A UM INPUT NORMAL, PORÉM PERMITI DIVERSAS LINHAS -->
                <label for="sinopse">Sinopse</label>
              </div>
            </div>
          </div>

          <!-- input de nota -->
          <div class="row">
            <div class="input-field col s4">
              <!-- step para controle decimal e min e max para melhor controle -->
              <input id="nota" name="nota" type="number" step=".1" min="0" max="10" class="validate">
              <label for="nota">Nota</label>
            </div>
          </div>

          <!-- input capa -->
          <div class="file-field input-field">
            <div class="btn purple lighten-2 black-text">
              <span>Capa do Filme</span>
              <input type="file" name="poster_file">
            </div>
            <div class="file-path-wrapper">
              <input name="poster" class="file-path validate" type="text">
            </div>
          </div>

        </div>
        <div class="card-action">
          <a class="waves-effect waves-light btn grey" href="#">Cancelar</a>
          <button class="waves-effect waves-light btn purple" type="submit" name="action">Confirmar</button>
        </div>
      </div>
    </div>
    </form>
  </div>

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>
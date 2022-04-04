<?php

 require "model/Filme.php";

$teste = new Filme();

var_dump(get_class_vars(get_class($teste)));

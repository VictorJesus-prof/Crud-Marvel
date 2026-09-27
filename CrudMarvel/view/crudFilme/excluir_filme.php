<?php
require_once(__DIR__ . "/../../model/Filme.php");
require_once(__DIR__ . "/../../controller/FilmeController.php");

if(isset($_GET["id_excluir"])){
    $id = $_GET["id_excluir"];

    $filmeCont = new FilmeController();
    $erros = $filmeCont->excluir($id);

    if(empty ($erros)){
        header("Location: listar_filme.php");
        exit;
    } else {
        print $erros;
        print "<br><a href='listar_filme.php'>Voltar</a>";
    }
}else{
    print "ID do filme não informado!<br>";
    print "<a href='listar_filme.php'>Voltar</a>";
}

?>
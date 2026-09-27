<?php
require_once(__DIR__ . "/../../dao/FilmeDAO.php");
require_once(__DIR__ . "/../../controller/FilmeController.php");

$msgErro = "";
$filme = null;
$filmeCont = new FilmeController();

if(isset($_POST["tituloFilme"])){
    $id = $_POST["id"];
    $url = trim($_POST["urlFilme"]) ? trim($_POST["urlFilme"]) : null;
    $titulo = trim($_POST["tituloFilme"]) ? trim($_POST["tituloFilme"]) : null;
    $anoLancamento = is_numeric($_POST["anoFilme"]) ? ($_POST["anoFilme"]) : null;
    $duracao = is_numeric($_POST["duracaoFilme"]) ? ($_POST["duracaoFilme"]) : null;
    $nota = is_numeric($_POST["notaFilme"]) ? ($_POST["notaFilme"]) : null;

    $filme = new Filme();
    $filme->setId($id);
    $filme->setUrl($url);
    $filme->setTitulo($titulo);
    $filme->setAnoLancamento($anoLancamento);
    $filme->setDuracao($duracao);
    $filme->setNota($nota);

    $erros = $filmeCont->alterar($filme);

    if (empty($erros)) {
        header("location: listar_filme.php");
        exit;
    } else {
        $msgErro = implode("<br>", $erros);
    }

} else {
    $id_alterar = 0;
    if (isset($_GET["id_alterar"])) {
        $id_alterar = $_GET["id_alterar"];
    }

    $filme = $filmeCont->buscarPorId($id_alterar);

    if (! $filme) {
        print "Id do filme inválido!<br>";
        print "<a href='listar_filme.php'>Voltar</a>";
        exit;
    }
}

require_once(__DIR__ . "/form_filme.php");


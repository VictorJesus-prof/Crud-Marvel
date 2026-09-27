<?php
require_once(__DIR__ . "/../../model/Filme.php");
require_once(__DIR__ . "/../../controller/FilmeController.php");

$msgErro = null;
$filme = null;

if(isset($_POST["tituloFilme"])){
    $url = trim($_POST["urlFilme"]) ? trim($_POST["urlFilme"]) : null;
    $titulo = trim($_POST["tituloFilme"]) ? trim($_POST["tituloFilme"]) : null;
    $anoLancamento = is_numeric($_POST["anoFilme"]) ? ($_POST["anoFilme"]) : null;
    $duracao = is_numeric($_POST["duracaoFilme"]) ? ($_POST["duracaoFilme"]) : null;
    $nota = is_numeric($_POST["notaFilme"]) ? ($_POST["notaFilme"]) : null;

    $filme = new Filme();
    $filme->setUrl($url);
    $filme->setTitulo($titulo);
    $filme->setAnoLancamento($anoLancamento);
    $filme->setDuracao($duracao);
    $filme->setNota($nota);

    $filmeCont = new FilmeController();
    $erros = $filmeCont->inserir($filme);

    if (empty($erros)) {
        header("location: listar_filme.php");
        exit;
    } else {
        $msgErro = implode("<br>", $erros);
    }

}

require_once(__DIR__ . "/form_filme.php");

?>
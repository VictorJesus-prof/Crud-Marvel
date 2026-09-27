<?php
require_once(__DIR__ . "/../../model/Personagem.php");
require_once(__DIR__ . "/../../model/Tipo.php");
require_once(__DIR__ . "/../../model/Filme.php");
require_once(__DIR__ . "/../../controller/PersonagemController.php");

$msgErro = null;
$personagem = null;

if(isset($_POST["nomePersonagem"])){
    $url = trim($_POST["urlPersonagem"]) ? trim($_POST["urlPersonagem"]) : null;
    $nome = trim($_POST["nomePersonagem"]) ? trim($_POST["nomePersonagem"]) : null;
    $poder = trim($_POST["poderPersonagem"]) ? trim($_POST["poderPersonagem"]) : null;
    $idTipo = is_numeric($_POST["tipoPersonagem"]) ? ($_POST["tipoPersonagem"]) : null;
    $idFilme = is_numeric($_POST["filmePersonagem"]) ? ($_POST["filmePersonagem"]) : null;

    $personagem = new Personagem();
    $personagem->setUrl($url);
    $personagem->setNome($nome);
    $personagem->setPoder($poder);

    $tipo = new Tipo();
    $tipo->setId($idTipo);
    $personagem->setTipo($tipo);

    $filme = new Filme();
    $filme->setId($idFilme);
    $personagem->setFilme($filme);
    
    $personagemCont = new PersonagemController();
    $erros = $personagemCont->inserir($personagem);

    if (empty($erros)) {
        header("location: listar_personagem.php");
        exit;
    } else {
        $msgErro = implode("<br>", $erros);
    }

}

require_once(__DIR__ . "/form_personagem.php");


?>
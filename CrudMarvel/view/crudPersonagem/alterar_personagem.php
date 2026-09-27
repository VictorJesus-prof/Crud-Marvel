<?php
require_once(__DIR__ . "/../../dao/PersonagemDAO.php");
require_once(__DIR__ . "/../../controller/PersonagemController.php");

$msgErro = "";
$personagem = null;
$personagemCont = new PersonagemController();

if (isset($_POST["nomePersonagem"])) {
    $id = $_POST["id"];
    $url = trim($_POST["urlPersonagem"]) ? trim($_POST["urlPersonagem"]) : null;
    $nome = trim($_POST["nomePersonagem"]) ? trim($_POST["nomePersonagem"]) : null;
    $poder = trim($_POST["poderPersonagem"]) ? trim($_POST["poderPersonagem"]) : null;
    $idTipo = is_numeric($_POST["tipoPersonagem"]) ? ($_POST["tipoPersonagem"]) : null;
    $idFilme = is_numeric($_POST["filmePersonagem"]) ? ($_POST["filmePersonagem"]) : null;

    $personagem = new Personagem();
    $personagem->setId($id);
    $personagem->setUrl($url);
    $personagem->setNome($nome);
    $personagem->setPoder($poder);
    
    $tipo = new Tipo();
    $tipo->setId($idTipo);
    $personagem->setTipo($tipo);

    $filme = new Filme();
    $filme->setId($idFilme);
    $personagem->setFilme($filme); 

    $erros = $personagemCont->alterar($personagem);

    if(empty($erros)){
        header("location: listar_personagem.php");
        exit;
    }else {   
        $msgErro = implode("<br>", $erros);
    }
} else {
    $id_alterar = 0;
    if (isset($_GET["id_alterar"])) {
        $id_alterar = $_GET["id_alterar"];
    }
    $personagem = $personagemCont->buscarPorId($id_alterar);

    if (! $personagem) {
        print "Id do personagem inválido!<br>";
        print "<a href='listar_personagem.php'>Voltar</a>";
        exit;
    }
}

require_once(__DIR__ . "/form_personagem.php");
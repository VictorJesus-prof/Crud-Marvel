<?php
require_once(__DIR__ . "/../../controller/PersonagemController.php");
require_once(__DIR__ . "/../../model/Personagem.php");

if(isset($_GET['id_excluir'])) {
    $id_excluir = $_GET['id_excluir'];

    $personagemCont = new PersonagemController();
    $erros = $personagemCont->excluir($id_excluir);

    if (empty($erros)) {
        header("Location: listar_personagem.php");
        exit;
    } else {
        print $erros;
        echo "<br><a href='listar_personagem.php'>Voltar</a>";
    }
} else {
    echo "ID do personagem não informado!<br>";
    echo "<a href='listar_personagem.php'>Voltar</a>";
}

?>
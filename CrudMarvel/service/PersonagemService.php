<?php
require_once(__DIR__ . "/../model/Personagem.php");
require_once(__DIR__ . "/../model/Tipo.php");

class PersonagemService{
     public function validar (Personagem $personagem) {

        $erros = array();

        if (! $personagem->getUrl()) {
            array_push($erros, "Informe a URL da foto do personagem! Ex: https://xxxxx...");
        } else if(strlen($personagem->getUrl()) < 10 || strlen($personagem->getUrl()) > 2048){
            array_push($erros, "A url deve ter entre 10 e 2048 caracteres!");
        }

        if (! $personagem->getNome()) {
            array_push($erros, "Informe o nome do personagem! Ex: Homem-Aranha...");
        }else if(strlen($personagem->getNome()) < 3 || strlen($personagem->getNome()) > 80){
            array_push($erros,"O nome do personagem deve ter entre 3 e 80 caracteres!");
        }

        if (! $personagem->getPoder()) {
            array_push($erros, "Informe o poder do personagem! Ex: Super-Força...");
        }

        if (! $personagem->getTipo()->getId()) {
            array_push($erros, "Selecione o tipo do personagem! Ex: Herói...");
        }

        if (! $personagem->getFilme()->getId()) {
            array_push($erros, "Selecione o filme do personagem! Ex: Espetacular Homem-Aranha...");
        }

        return $erros;
    }

}

?>
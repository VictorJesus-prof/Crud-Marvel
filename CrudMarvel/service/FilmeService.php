<?php
require_once(__DIR__ . "/../model/Filme.php");
require_once(__DIR__ . "/../model/Personagem.php");

class FilmeService{
    
    public function validar (Filme $filme) {

        $erros = array();

        if (! $filme->getUrl()) {
            array_push($erros, "Informe a URL da capa do filme! Ex: https://xxxxx...");
        }else if(strlen($filme->getUrl()) < 10 || strlen($filme->getUrl()) > 2048){
            array_push($erros, "A url do filme deve ter entre 10 e 2048 caracteres!");
        }

        if (! $filme->getTitulo()) {
            array_push($erros, "Informe o titulo do filme! Ex: Homem-Aranha...");
        }else if(strlen($filme->getTitulo()) < 3 || strlen($filme->getTitulo()) > 80){
            array_push($erros, "O título do filme deve ter entre 3 e 80 caracteres!");
        }

        if (! $filme->getAnoLancamento()) {
            array_push($erros, "Informe o ano de lançamento do filme! Ex: 2008...");
        }else if ($filme->getAnoLancamento() < 1900 || $filme->getAnoLancamento() > 2027 ){
            array_push($erros, "Ano inválido! Informe outra data de lançamento.");
        }

        if ($filme->getDuracao() == null) {
            array_push($erros, "Informe a duração em minutos do filme! Ex: 120...");
        } else if($filme->getDuracao() < 0 || $filme->getDuracao() > 600){
            array_push($erros, "Duração deve estar entre 0 e 600 minutos!");
        }

        if ($filme->getNota() == null) {
            array_push($erros, "Informe a nota que o filme possuí! Ex: 7.2...");
        }else if($filme->getNota() < 0 || $filme->getNota() > 10){
            array_push($erros, "Nota deve estar entre 0 e 10!");
        }


        return $erros;
    }

}

?>
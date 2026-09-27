<?php

require_once(__DIR__ . "/Tipo.php");
require_once(__DIR__ . "/Filme.php");

class Personagem {
    
    private ?int $id = null;
    private ?string $url = null;
    private ?string $nome = null;
    private ?string $poder = null;
    private ?Tipo $tipo = null;
    private ?Filme $filme = null;
    
    //GET's & SET's

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getPoder(): ?string
    {
        return $this->poder;
    }

    public function setPoder(?string $poder): self
    {
        $this->poder = $poder;

        return $this;
    }

    public function getTipo(): ?Tipo
    {
        return $this->tipo;
    }

    public function setTipo(?Tipo $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getFilme(): ?Filme
    {
        return $this->filme;
    }

    public function setFilme(?Filme $filme): self
    {
        $this->filme = $filme;

        return $this;
    }
}

?>
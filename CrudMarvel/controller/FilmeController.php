<?php
require_once(__DIR__ . "/../dao/FilmeDAO.php");
require_once(__DIR__ . "/../model/Filme.php");
require_once(__DIR__ . "/../service/FilmeService.php");

class FilmeController
{
    private FilmeDAO $filmeDAO;
    private FilmeService $filmeService;

    public function __construct()
    {
        $this->filmeDAO = new FilmeDAO();
        $this->filmeService = new FilmeService();
    }

    public function listar()
    {
        return $this->filmeDAO->list();
    }

    public function inserir(Filme $filme)
    {
        $erros = $this->filmeService->validar($filme);

        if (empty($erros)) {
            $erroDAO = $this->filmeDAO->insert($filme);

            if ($erroDAO) {
                array_push($erros, $erroDAO);
            }
        }

        return $erros;
    }

    public function alterar(Filme $filme) 
    {
        $erros = $this->filmeService->validar($filme);

        if (empty($erros)) {
            $erroDAO = $this->filmeDAO->update($filme);

            if ($erroDAO) {
                array_push($erros, $erroDAO);
            }
        }

        return $erros;
    }

    public function excluir(int $id_excluir)
    {
        return $this->filmeDAO->delete($id_excluir);
    }

    public function buscarPorId(int $id_alterar)
    {
        return $this->filmeDAO->findById($id_alterar);
    }
}

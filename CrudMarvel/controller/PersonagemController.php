<?php
require_once(__DIR__ . "/../dao/PersonagemDAO.php");
require_once(__DIR__ . "/../model/Personagem.php");
require_once(__DIR__ . "/../service/PersonagemService.php");

class PersonagemController
{
    private PersonagemDAO $personagemDAO;
    private PersonagemService $personagemService;

    public function __construct()
    {
        $this->personagemDAO = new PersonagemDAO();
        $this->personagemService = new PersonagemService();
    }

    public function listar()
    {
        return $this->personagemDAO->list();
    }

    public function inserir(Personagem $personagem)
    {
        $erros = $this->personagemService->validar($personagem);

        if (empty($erros)) {
            $erroDAO = $this->personagemDAO->insert($personagem);

            if ($erroDAO) {
                array_push($erros, $erroDAO);
            }
        }

        return $erros;
    }

    public function alterar(Personagem $personagem)
    {
        $erros = $this->personagemService->validar($personagem);

        if (empty($erros)) {
            $erroDAO = $this->personagemDAO->update($personagem);

            if ($erroDAO) {
                array_push($erros, $erroDAO);
            }
        }

        return $erros;
    }

    public function excluir(int $id_excluir)
    {
        return $this->personagemDAO->delete($id_excluir);
    }

    public function buscarPorId(int $id_alterar)
    {
        return $this->personagemDAO->findById($id_alterar);
    }
}

<?php
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Personagem.php");
require_once(__DIR__ . "/../model/Tipo.php");
require_once(__DIR__ . "/../model/Filme.php");


class PersonagemDAO
{

    public function list()
    {
        $conn = Connection::getConnection();

        $sql = "SELECT p.*, t.nome nome_tipo, f.titulo titulo_filme
                FROM personagens p 
                JOIN tipos t ON (t.id = p.id_tipo)
                JOIN filmes f ON (f.id = p.id_filme)";

        $stm = $conn->prepare($sql);
        $stm->execute();
        $dadosPersonagem = $stm->fetchALL();

        return $this->map($dadosPersonagem);
    }

    public function insert(Personagem $personagem)
    {
        try {
            $conn = Connection::getConnection();
            $sql = "INSERT INTO personagens (url, nome, poder, id_tipo, id_filme) VALUES (?, ?, ?, ?, ?)";

            $stm = $conn->prepare($sql);
            $stm->execute([
                $personagem->getUrl(),
                $personagem->getNome(),
                $personagem->getPoder(),
                $personagem->getTipo()->getId(),
                $personagem->getFilme()->getId()
            ]);
        } catch (PDOException $e) {
            $erro = "Erro ao inserir o personagem. Tente Novamente";

            if (AMB_DEV) {
                $erro .= "<br>" . $e->getMessage();
            }

            return $erro;
        }
    }

    public function update(Personagem $personagem)
    {
        try {
            $conn = Connection::getConnection();
            $sql = "UPDATE personagens 
                    SET url = ?, nome = ?, poder = ?, id_tipo = ?, id_filme = ?
                    WHERE id = ?";
            $stm = $conn->prepare($sql);
            $stm->execute([
                $personagem->getUrl(),
                $personagem->getNome(),
                $personagem->getPoder(),
                $personagem->getTipo()->getId(),
                $personagem->getFilme()->getId(),
                $personagem->getId()
            ]);
        } catch (PDOException $e) {
            $erro = "Erro ao alterar o personagem. Tente Novamente";
            if (AMB_DEV) {
                $erro .= "<br>" . $e->getMessage();
            }
            return $erro;
        }
    }

    public function delete(int $id_excluir)
    {
        try {
            $conn = Connection::getConnection();
            $sql = "DELETE FROM personagens WHERE id = ?";

            $stm = $conn->prepare($sql);
            $stm->execute([$id_excluir]);
        } catch (PDOException $e) {
            $erro = "Erro ao excluir o personagem. Tente novamente";
            if (AMB_DEV) {
                $erro .= "<br>" . $e->getMessage();
            }
            return $erro;
        }
    }

    public function findById(int $id_alterar): ?Personagem
    {
        $conn = Connection::getConnection();
        $sql = "SELECT p.*, t.nome nome_tipo, f.titulo titulo_filme
                FROM personagens p 
                JOIN tipos t ON (t.id = p.id_tipo)
                JOIN filmes f ON (f.id = p.id_filme)
                WHERE p.id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$id_alterar]);
        $dadosPersonagem = $stm->fetchALL();
        $personagens = $this->map($dadosPersonagem);

        if (! empty($personagens)) {
            return $personagens[0];
        } else {
            return null;
        }
    }


    public function map(array $dadosPersonagem)
    {
        $personagens = array();
        foreach ($dadosPersonagem as $d) {
            $personagem = new Personagem();
            $personagem->setId($d['id']);
            $personagem->setUrl($d['url']);
            $personagem->setNome($d['nome']);
            $personagem->setPoder($d['poder']);

            $tipo = new Tipo();
            $tipo->setId($d['id_tipo']);
            $tipo->setNome($d['nome_tipo']);

            $personagem->setTipo($tipo);

            $filme = new Filme();
            $filme->setId($d['id_filme']);
            $filme->setTitulo($d['titulo_filme']);

            $personagem->setFilme($filme);

            array_push($personagens, $personagem);
        }

        return $personagens;
    }
}

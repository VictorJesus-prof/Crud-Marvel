<?php
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Filme.php");

class FilmeDAO
{

    public function list()
    {
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM filmes";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $dadosFilme = $stm->fetchALL();

        return $this->map($dadosFilme);
    }

    public function insert(Filme $filme)
    {
        try {
            $conn = Connection::getConnection();

            $sql = "INSERT INTO filmes (url, titulo, ano_lancamento, duracao, nota) VALUES (?, ?, ?, ?, ?)";
            $stm = $conn->prepare($sql);
            $stm->execute([
                $filme->getUrl(),
                $filme->getTitulo(),
                $filme->getAnoLancamento(),
                $filme->getDuracao(),
                $filme->getNota()
            ]);
        } catch (PDOException $e) {
            $erro = "Erro ao inserir o filme. Tente Novamente";

            if (AMB_DEV) {
                $erro .= "<br>" . $e->getMessage();
            }

            return $erro;
        }
    }

    public function update(Filme $filme){
        try {
            $conn = Connection::getConnection();
            $sql = "UPDATE filmes SET url = ?, titulo = ?, ano_lancamento = ?, duracao = ?, nota = ? WHERE id = ?";
            $stm = $conn->prepare($sql);
            $stm->execute([
                $filme->getUrl(),
                $filme->getTitulo(),
                $filme->getAnoLancamento(),
                $filme->getDuracao(),
                $filme->getNota(),
                $filme->getId()
            ]);
        } catch(PDOException $e){
            $erro = "Erro ao alterar o filme. Tente Novamente";
            if(AMB_DEV){
                $erro .= "<br>" . $e->getMessage(); 
            }
            return $erro;
        }
    }


    public function delete(int $id_excluir)
    {
        try {
            $conn = Connection::getConnection();

            $sql = "DELETE FROM filmes WHERE id = ?";
            $stm = $conn->prepare($sql);
            $stm->execute([$id_excluir]);
        } catch (PDOException $e) {
            $erro = "Erro ao excluir o filme. Tente Novamente.";
            if (AMB_DEV) {
                $erro .= "<br>" . $e->getMessage();
            }
            return $erro;
        }
    }

    public function findById(int $id_alterar): ?Filme{
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM filmes WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$id_alterar]);
        $dadosFilme = $stm->fetchAll();
        $filmes = $this->map($dadosFilme);

        if(! empty($filmes)){
            return $filmes[0];
        }else{
            return null;
        }

    }

    public function map(array $dadosFilme)
    {
        $filmes = array();
        foreach ($dadosFilme as $d) {
            $filme = new Filme();
            $filme->setId($d['id']);
            $filme->setUrl($d['url']);
            $filme->setTitulo($d['titulo']);
            $filme->setAnoLancamento($d['ano_lancamento']);
            $filme->setDuracao($d['duracao']);
            $filme->setNota($d['nota']);

            array_push($filmes, $filme);
        }

        return $filmes;
    }
}

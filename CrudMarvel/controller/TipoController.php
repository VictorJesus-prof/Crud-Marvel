<?php
require_once(__DIR__ . "/../dao/TipoDAO.php");
require_once(__DIR__ . "/../model/Tipo.php");

class TipoController{
    private TipoDAO $tipoDAO;

    public function __construct() {
        $this->tipoDAO = new TipoDAO();
    }

    public function listar () {
        return $this->tipoDAO->list();
    }
}

?>
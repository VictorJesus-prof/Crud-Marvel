<?php
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Tipo.php");

class TipoDAO{

    public function list(){
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM tipos";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $dadosTipo = $stm->fetchALL();

        return $this->map($dadosTipo);
    }

    public function map(array $dadosTipo){
        $tipos = array(); 
        
        foreach ($dadosTipo as $d) {
            $tipo = new Tipo();    
            $tipo->setId($d['id']);
            $tipo->setNome($d['nome']);
            
            array_push($tipos, $tipo);
        }

        return $tipos;

    }

}


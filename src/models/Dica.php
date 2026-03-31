<?php
class Dica {
    private $pdo;

    public function __construct($conexao) {
        $this->pdo = $conexao;
    }

    public function buscarTodas() {
        //Aqui nós usamos o SELECT pra trazer as dicas
        return []; 
    }
}
?>
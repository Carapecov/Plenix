<?php
class Historia {
    private $pdo;

    public function __construct($conexao) {
        $this->pdo = $conexao;
    }

    public function buscarHistoriasReais() {
        //Usaremos SELECT para buscar as histórias das pessoas que entrevistarmos
        return [];
    }
}
?>
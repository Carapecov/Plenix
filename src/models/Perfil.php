<?php
class Perfil {
    private $pdo;

    public function __construct($conexao)
    {
        $this->pdo = $conexao;
    }
    public function avaliarRespostas($fase, $dor) {
        return true;
    }

    public function buscarDicas ($categoria) { 

    return [];
    }
}
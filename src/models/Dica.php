<?php
class Dica {
    private $pdo;

    public function __construct($conexao) {
        $this->pdo = $conexao;
    }

    public function buscarTodas() {
        if ($this->pdo === null) return [];
        try {
            $stmt = $this->pdo->query("
                SELECT dicas.*, perfis_dor.fase_negocio 
                FROM dicas 
                LEFT JOIN perfis_dor ON dicas.perfil_dor_id = perfis_dor.id 
                WHERE dicas.visivel = 1 
                ORDER BY dicas.id DESC
            ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function buscarDica($dor) {
        if ($this->pdo === null) return null;
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM dicas WHERE categoria = :dor AND visivel = 1 LIMIT 1");
            $stmt->bindParam(':dor', $dor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function buscarDicasPorPerfil($perfil_dor_id) {
        if ($this->pdo === null) return [];
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM dicas WHERE perfil_dor_id = :id AND visivel = 1");
            $stmt->bindParam(':id', $perfil_dor_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function avaliarDica($id, $tipo) {
        if ($this->pdo === null) return false;
        try {
            if ($tipo === 'like') {
                $stmt = $this->pdo->prepare("UPDATE dicas SET curtiu = curtiu + 1 WHERE id = :id");
            } else {
                $stmt = $this->pdo->prepare("UPDATE dicas SET nao_gostei = nao_gostei + 1 WHERE id = :id");
            }
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }
}
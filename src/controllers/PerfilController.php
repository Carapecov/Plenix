<?php
class PerfilController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $escolhas = [];
        try {
            $stmt = $this->pdo->query("SELECT * FROM perfis_dor");
            if ($stmt) {
                $escolhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            // Ignora o erro silenciosamente caso a tabela não exista, garantindo que o form rode sem crachar
        }

        $css_especifico = 'formulario.css';
        require_once 'views/layouts/header.php';
        require_once 'views/formulario.php';
        require_once 'views/layouts/footer.php';
    }
    
    public function resultado() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fase = filter_input(INPUT_POST, 'fase_negocio', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
            $perfil_dor_id = filter_input(INPUT_POST, 'perfil_dor_id', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';

            if ($perfil_dor_id === 'Outro') {
                header('Location: dicas');
                exit();
            }

            require_once 'models/Dica.php';
            $dicaModel = new Dica($this->pdo);

            $dicas_perfeitas = $dicaModel->buscarDicasPorPerfil($perfil_dor_id);

            $cor_fase = '#10b981';
            $cor_fase_rgb = '16, 185, 129';
            if ($fase === 'Começando') {
                $cor_fase = '#06b6d4';
                $cor_fase_rgb = '6, 182, 212';
            } elseif ($fase === 'Consolidado') {
                $cor_fase = '#3b82f6';
                $cor_fase_rgb = '59, 130, 246';
            } elseif ($fase === 'Risco') {
                $cor_fase = '#ef4444';
                $cor_fase_rgb = '239, 68, 68';
            }

            $css_especifico = 'formulario.css';
            require_once 'views/layouts/header.php';
            require_once 'views/resultado.php';
            require_once 'views/layouts/footer.php';
        } else {
            header('Location: formulario');
            exit();
        }
    }
}
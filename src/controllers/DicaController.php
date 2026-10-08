<?php
class DicaController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        require_once 'models/Dica.php';
        $dicaModel = new Dica($this->pdo);
        $todas_dicas = $dicaModel -> buscarTodas();

        require_once 'views/layouts/header.php';
        require_once 'views/dicas.php';
        require_once 'views/layouts/footer.php';
    }

    public function avaliar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($id && in_array($tipo, ['like', 'dislike'])) {
                require_once 'models/Dica.php';
                $dicaModel = new Dica($this->pdo);
                $sucesso = $dicaModel->avaliarDica($id, $tipo);
                
                header('Content-Type: application/json');
                echo json_encode(['sucesso' => $sucesso]);
                exit;
            }
        }
        http_response_code(400);
        echo json_encode(['sucesso' => false, 'erro' => 'Requisição inválida']);
        exit;
    }
}
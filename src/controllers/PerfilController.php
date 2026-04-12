<?php
class PerfilController {
    public function index() {
        require_once 'views/layouts/header.php';
        require_once 'views/formulario.php';
        require_once 'views/layouts/footer.php';
    }
    
    public function resultado() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fase = $_POST['fase_negocio'] ?? '';
        $dor = $_POST['maior_dor'] ?? '';

        require_once 'models/Dica.php';
        $dicaModel = new Dica(null);

        $dica_perfeita = $dicaModel->buscarDica($dor);

        require_once 'views/layouts/header.php';
        require_once 'views/resultado.php';
        require_once 'views/layouts/footer.php';
        } else {
            header('Location: formulario');
            exit();
        }
    }
}
?>
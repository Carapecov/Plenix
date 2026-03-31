<?php
class PerfilController {
    public function index() {
        require_once 'views/layouts/header.php';
        require_once 'views/formulario.php';
        require_once 'views/layouts/footer.php';
    }
    
    public function resultado() {
        require_once 'views/layouts/header.php';
        require_once 'views/resultado.php';
        require_once 'views/layouts/footer.php';
    }
}
?>
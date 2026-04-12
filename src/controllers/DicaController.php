<?php
class DicaController {
    public function index() {
        require_once 'models/Dica.php';
        $dicaModel = new Dica(null);
        $todas_dicas = $dicaModel -> buscarTodas();

        require_once 'views/layouts/header.php';
        require_once 'views/dicas.php';
        require_once 'views/layouts/footer.php';
    }
}
?>
<?php
class DicaController {
    public function index() {
        //Aqui vamos instaciar o Model antes
        require_once 'views/layouts/header.php';
        require_once 'views/dicas.php';
        require_once 'views/layouts/footer.php';
    }
}
?>
<?php
class HistoriaController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        require_once 'views/layouts/header.php';
        require_once 'views/historias.php';
        require_once 'views/layouts/footer.php';
    }
}
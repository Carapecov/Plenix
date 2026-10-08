<?php
class HomeController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $css_especifico = 'home.css';
        require_once 'views/layouts/header.php';
        require_once 'views/home.php';
        require_once 'views/layouts/footer.php';
    }
}
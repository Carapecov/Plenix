<?php
class HomeController {
    public function index() {
        $css_especifico = 'home.css';
        require_once 'views/layouts/header.php';
        require_once 'views/home.php';
        require_once 'views/layouts/footer.php';
    }
}
?>
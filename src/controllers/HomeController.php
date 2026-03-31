<?php
class HomeController {
    public function index() {
        require_once 'views/layouts/header.php';
        require_once 'views/home.php';
        require_once 'views/layouts/footer.php';
    }
}
?>
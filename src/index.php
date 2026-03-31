<?php

$url = isset($_GET['url']) && $_GET['url'] !== '' ? $_GET['url'] : 'home';

switch ($url) {
    case 'home':
        require_once 'controllers/HomeController.php';
        $controller = new HomeController(); 
        $controller->index();               
        break;

    case 'dicas':
        require_once 'controllers/DicaController.php';
        $controller = new DicaController();
        $controller->index();
        break;

    case 'formulario':
        require_once 'controllers/PerfilController.php';
        $controller = new PerfilController();
        $controller->index();
        break;
        
    case 'resultado':
        require_once 'controllers/PerfilController.php';
        $controller = new PerfilController();
        $controller->resultado();
        break;

    case 'historias':
        require_once 'controllers/HistoriaController.php';
        $controller = new HistoriaController();
        $controller->index();
        break;

    default:
        require_once 'views/erro404.php';
        break;
}
?>
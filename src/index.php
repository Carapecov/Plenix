<?php
require_once 'config/database.php';

$url = isset($_GET['url']) && $_GET['url'] !== '' ? $_GET['url'] : 'home';

switch ($url) {
    case 'home':
        require_once 'controllers/HomeController.php';
        $controller = new HomeController($pdo); 
        $controller->index();               
        break;

    case 'dicas':
        require_once 'controllers/DicaController.php';
        $controller = new DicaController($pdo);
        $controller->index();
        break;

    case 'avaliar-dica':
        require_once 'controllers/DicaController.php';
        $controller = new DicaController($pdo);
        $controller->avaliar();
        break;

    case 'formulario':
        require_once 'controllers/PerfilController.php';
        $controller = new PerfilController($pdo);
        $controller->index();
        break;
        
    case 'resultado':
        require_once 'controllers/PerfilController.php';
        $controller = new PerfilController($pdo);
        $controller->resultado();
        break;

    case 'historias':
        require_once 'controllers/HistoriaController.php';
        $controller = new HistoriaController($pdo);
        $controller->index();
        break;

    default:
        require_once 'views/erro404.php';
        break;
}
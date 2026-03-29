<?php

$url = isset($_GET['url']) ? $_GET['url'] : 'home';

switch ($url) {
    case 'home':
        require_once 'controllers/HomeController.php';
        break;

    case 'dicas':
        require_once 'controllers/DicaController.php';
        break;

    case 'formulario':
        require_once 'controllers/PerfilController.php';
        break;

    case 'historias':
        require_once 'controllers/HistoriaController.php';
        break;

    default:
        require_once 'views/erro404.php';
        break;
}
?>
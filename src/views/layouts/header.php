<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Plenix - O parceiro oficial do seu negócio. Ferramentas, dicas e guia para MEIs.">
    <title>Plenix - Seu Parceiro de Negócios</title>
    <link rel="icon" type="image/png" href="assets/img/Fenix.png">
    <?php
    $base_url = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    if (substr($base_url, -1) !== '/') {
        $base_url .= '/';
    }
    ?>
    <base href="<?php echo htmlspecialchars($base_url); ?>">
    
    <link rel="stylesheet" href="assets/css/global.css">
    
    <?php if (isset($css_especifico)): ?>
    <link rel="stylesheet" href="assets/css/<?php echo $css_especifico; ?>">
    <?php endif; ?>
</head>
<body>
    <header style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px;">
        <style>
            .fire-title {
                color: #a7f3d0;
                text-shadow: 
                    0 0 5px #10b981, 
                    0 -2px 10px #047857, 
                    0 -5px 15px #065f46, 
                    0 -8px 20px #064e3b;
                animation: fireFlicker 2s infinite alternate;
                letter-spacing: 2px;
                text-transform: uppercase;
                margin: 0;
            }
            @keyframes fireFlicker {
                0% { text-shadow: 0 0 5px #86efac, 0 -3px 10px #22c55e, 0 -6px 15px #166534, 0 -10px 20px #14532d; }
                100% { text-shadow: 0 0 8px #bbf7d0, 0 -5px 12px #4ade80, 0 -8px 20px #15803d, 0 -13px 25px #14532d; }
            }
        </style>
        <h1 style="display: flex; align-items: center; gap: 10px; margin: 0; text-decoration: none;">
            <img src="assets/img/Fenix.png" alt="Fenix Plenix" style="height: 35px; filter: drop-shadow(0 0 5px rgba(74, 222, 128, 0.4));" onerror="this.style.display='none'">
            <span class="fire-title">Plenix</span>
        </h1>
        <nav>
            <a href="home">Início</a>
            <a href="dicas">Dicas</a>
            <a href="formulario">Seu Perfil</a>
            <a href="historias">Histórias</a>
        </nav>
    </header>
    <main class="container">
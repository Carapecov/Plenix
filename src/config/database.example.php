<?php
// ATENÇÃO: NÃO alterem este arquivo com suas senhas reais!
// Façam uma CÓPIA deste arquivo na máquina de vocês, renomeiem para 'database.php'
// E preencham com as suas configurações locais

$host = 'localhost';
$dbname = 'plenix_db'; // Nome do banco de dados que vamos criar no phpMyAdmin
$usuario = 'root';     // Seu usuário do MySQL (padrão XAMPP é 'root')
$senha = '';           // Sua senha do MySQL (padrão XAMPP é vazio)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}
?>
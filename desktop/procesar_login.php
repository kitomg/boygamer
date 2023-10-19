<?php
require_once "claseusuario/ControladorInicio";
if (empty($_POST['usuario']) || empty($_POST['contrasena'])) {
    $redirigir = 'proyectofinal.php?mensaje=Error: Falta un campo obligatorio';
} else {
    $cs = new ControladorInicio();
    $login = $cs->login($_POST['usuario'], $_POST['contrasena']);
    if ($login[0] === true) {
        $redirigir = 'principal.php';
    } else {
        $redirigir = 'proyectofinal.html?mensaje=' . $login[1];
    }
}
header('Location: ' . $redirigir);

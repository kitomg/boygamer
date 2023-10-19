<?php
session_start(); // Inicia la sesión

require_once 'RepositorioUsuario.php';

if (empty($_POST['usuario']) && empty($_POST['contrasena'])) {
    echo "Por favor, complete el campo de usuario y la contraseña antes de enviar el formulario.";
} elseif (empty($_POST['usuario'])) {
    echo "Por favor, complete el campo de usuario antes de enviar el formulario.";
} elseif (empty($_POST['contrasena'])) {
    echo "Por favor, complete el campo de contraseña antes de enviar el formulario.";
} else {
   
    $cs = new RepositorioUsuario();
    $login = $cs->login($_POST['usuario'], $_POST['contrasena']);
    
}

?>

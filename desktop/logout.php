<?php
session_start();
session_destroy();
header('Location: proyectofinal.php?mensaje=Sesión cerrada con éxito');

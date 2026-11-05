<?php
session_start();

// CERRAR SESION

$_SESSION = array();

session_destroy();

// VOLVER AL LOGIN

header("Location: login.php");
exit();
?>
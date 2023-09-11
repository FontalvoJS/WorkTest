<?php
// CLOSE ALL SESSIONS AND DELETE ALL COOKIES
require 'sessionVerify.php';
if (isset($_COOKIE['token']) && !empty($_COOKIE['token']) || isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    $_SESSION = array();
    session_destroy();
    function destroySession($cookieName)
    {
        if (isset($_COOKIE[$cookieName])) {
            unset($_COOKIE[$cookieName]);  // Eliminar el valor de la cookie en el array $_COOKIE

            // Establecer la cookie con una fecha de expiración en el pasado para eliminarla
            setcookie($cookieName, '', time() - 3600, '/');
        }
        header('Location: ../index.php');
    }

    // Uso:
    $nombreDeLaCookie = "token";
    destroySession($nombreDeLaCookie);
}

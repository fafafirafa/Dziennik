<?php
    include "session.php";

    $_SESSION['user'] = '';
    $_SESSION['login'] = false;
       $params = session_get_cookie_params();
       setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
       );
    session_destroy();
    echo "Wylogowano pomyślnie";
    header("Refresh:0");
?>
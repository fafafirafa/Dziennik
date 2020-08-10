<?php
include 'connection.php';

    if(Isset($_POST['id'])) {
        $Id = mysqli_real_escape_string($mysqli, $_POST['id']);
        if($mysqli->query("DELETE FROM `wykluczenia` WHERE Id=$Id")){
            echo "Pomyślnie usunięto";
        } else {
            printf($mysqli->error);
        }
    }

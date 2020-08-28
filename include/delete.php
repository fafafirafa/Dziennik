<?php
include 'connection.php';

if (isset($_POST['id'])) {
    $Id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $usr = $mysqli->query("SELECT `Nadajacy` FROM `wykluczenia` WHERE Id=$Id");
    if ($usr->num_rows > 0) {
        $row = $usr->fetch_assoc();
        $user = $row['Nadajacy'];
    }
    
    $count = $mysqli->query("SELECT `Wpisy` FROM `uzytkownicy` WHERE `User` = '$user'");
    if ($count->num_rows > 0) {
        $row = $count->fetch_assoc();
        $count = $row['Wpisy'];
        $count--;
    } else {
        $count = 0;
    }
    if ($mysqli->query("DELETE FROM `wykluczenia` WHERE Id=$Id")) {
        if ($mysqli->query("UPDATE `uzytkownicy` SET `Wpisy` = '$count' WHERE `User` = '$user'")) {
            echo "Pomyślnie usunięto";
        } else {
            printf($mysqli->error);
        }
    } else {
        printf($mysqli->error);
    }
}

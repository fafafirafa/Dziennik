<?php
include 'connection.php';

    if(Isset($_POST['id'])) {
        $Id = mysqli_real_escape_string($mysqli, $_POST['id']);
        $usr = $mysqli->query("SELECT `Nadajacy` FROM `wykluczenia` WHERE Id=$Id");
        if($usr->num_rows > 0){
            while($row = $usr->fetch_assoc()){
                $user = $row['Nadajacy'];
            }
        }
        $count = $mysqli->query("SELECT `Wpisy` FROM `uzytkownicy` WHERE `User` = '$user'");
        if($count->num_rows > 0) {
            while($row = $count->fetch_assoc()){
                $count = $row['Wpisy'];
            }
        }
        $count--;
        if($mysqli->query("DELETE FROM `wykluczenia` WHERE Id=$Id")){
            $mysqli->query("UPDATE `uzytkownicy` SET `Wpisy` = '$count' WHERE `User` = '$user'");
            echo "Pomyślnie usunięto";
        } else {
            printf($mysqli->error);
        }
    }

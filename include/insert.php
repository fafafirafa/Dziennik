<?php

//include 'connection.php';
$tak = mysqli_real_escape_string($mysqli, 'MESSAGE');
if($mysqli->query("INSERT INTO `ogloszenia`(`Tresc`) VALUES ('$tak')")){
    echo "Tak";
} else {
    printf($mysqli->error);
}
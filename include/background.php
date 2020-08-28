<?php
include 'connection.php';

// Check all variables if they exist, else end
if (isset($_POST["stream"]) && isset($_POST["give"]) && isset($_POST["givento"]) && isset($_POST["type"]) && isset($_POST["reason"])) {
    $stream = mysqli_real_escape_string($mysqli, $_POST["stream"]);
    $nadajacy = mysqli_real_escape_string($mysqli, $_POST["give"]);
    $wykluczony = mysqli_real_escape_string($mysqli, $_POST["givento"]);
    $typ = mysqli_real_escape_string($mysqli, $_POST["type"]);
    $godzina = mysqli_real_escape_string($mysqli, $_POST["hour"]);
    $data = mysqli_real_escape_string($mysqli, $_POST["date"]);
    $powod = mysqli_real_escape_string($mysqli, $_POST["reason"]);
    $za = mysqli_real_escape_string($mysqli, $_POST["what"]);


    ($_POST['time'] == 0 || $_POST['time'] == "") ? ($czas = mysqli_real_escape_string($mysqli, 300)) : ($czas = mysqli_real_escape_string($mysqli, $_POST['time']));
    ($typ == 0) ? ($typ = "Timeout") : ($typ = "Perm");

    $count = $mysqli->query("SELECT `Wpisy` FROM `uzytkownicy` WHERE `User` = '$nadajacy'");
    if ($count->num_rows > 0) {
        while ($row = $count->fetch_assoc()) {
            $count = $row['Wpisy'];
        }
        $count++;
    } else {
        $insert = $mysqli->query("INSERT INTO `uzytkownicy`(`User`, `Password`,`Wpisy`) VALUES ('$nadajacy',0,0)");
        $count = 1;
    }

    // Put into database timeout/perm
    switch ($typ) {
        case "Timeout":
            if ($mysqli->query("INSERT INTO `wykluczenia`(`Stream`, `Nadajacy`, `Wykluczony`, `Typ`, `Czas`, `Godzina`, `Data`, `Powod`, `Szczegoly`) VALUES ('$stream', '$nadajacy', '$wykluczony', '$typ', '$czas', '$godzina', '$data', '$za', '$powod')")) {
                $mysqli->query("UPDATE `uzytkownicy` SET `Wpisy` = '$count' WHERE `User` = '$nadajacy'");
                echo "Sukces!";
            } else {
                printf("1 - " . $mysqli->error);
            }
            break;
        case "Perm":
            if ($mysqli->query("INSERT INTO `wykluczenia`(`Stream`, `Nadajacy`, `Wykluczony`, `Typ`, `Godzina`, `Data`, `Powod`, `Szczegoly`) VALUES ('$stream', '$nadajacy', '$wykluczony', '$typ', '$godzina', '$data', '$za', '$powod')")) {
                $mysqli->query("UPDATE `uzytkownicy` SET `Wpisy` = '$count' WHERE `User` = '$nadajacy'");
                echo "Sukces!";
            } else {
                printf("2 - " . $mysqli->error);
            }
    }
}

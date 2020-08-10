<?php
include 'include/connection.php';

echo "<span class='close'>X</span>
    <select style='width: 160px;' class='streamSelect'>";


$everyone = mysqli_real_escape_string($mysqli, $_GET['str']);
$idiota = mysqli_real_escape_string($mysqli, $_GET['idiota']);
$page = mysqli_real_escape_string($mysqli, $_GET['page']);
if (!empty($idiota)) {
    $everyone = "";
}

$max = 10;
if(!isset($page)){
    $from = 0;
    $fr = 10;
} else {
    $from = $page*10;
    $fr = ($page+1)*10;
}
if (empty($everyone)) {
    if (empty($idiota)) {
        $result = $mysqli->query("SELECT `Id`, `Stream`, `Nadajacy`, `Wykluczony`, `Typ`, `Czas`, `Godzina`, `Data`, `Powod`, `Szczegoly` FROM `wykluczenia` ORDER BY Id desc LIMIT $from,$max ");
        $check = $mysqli->query("SELECT `Id` FROM `wykluczenia` ORDER BY Id desc LIMIT $fr,$max ");
    } else {
        $result = $mysqli->query("SELECT `Id`, `Stream`, `Nadajacy`, `Wykluczony`, `Typ`, `Czas`, `Godzina`, `Data`, `Powod`, `Szczegoly` FROM `wykluczenia` WHERE Wykluczony = '$idiota' ORDER BY Id desc LIMIT $from,$max ");
        $check = $mysqli->query("SELECT `Id` FROM `wykluczenia` WHERE Wykluczony = '$idiota' ORDER BY Id desc LIMIT $fr,$max ");
    }
    $streams = $mysqli->query("SELECT DISTINCT `Stream` FROM `wykluczenia`");

    echo "<option >Wyświetl wszystkich</option>";
    $streams = $mysqli->query("SELECT DISTINCT `Stream` FROM `wykluczenia`");
    if ($streams->num_rows > 0) {
        while ($row = $streams->fetch_assoc()) {
            echo "<option value='" . $row['Stream'] . "'>" . $row['Stream'] . "</option>";
        }
    }
} else {
    $result = $mysqli->query("SELECT `Id`, `Stream`, `Nadajacy`, `Wykluczony`, `Typ`, `Czas`, `Godzina`, `Data`, `Powod`, `Szczegoly` FROM `wykluczenia` WHERE Stream = '" . $everyone . "' ORDER BY Id desc LIMIT $from,$max ");
    $check = $mysqli->query("SELECT `Id` FROM `wykluczenia` WHERE Stream = '" . $everyone . "' ORDER BY Id desc LIMIT $fr,$max ");

    echo "<option value='" . $everyone . "'>" . $everyone . "</option>";
    echo "<option value='0'>Wyświetl wszystkich</option>";
    $streams = $mysqli->query("SELECT DISTINCT `Stream` FROM `wykluczenia` WHERE Stream != '" . $everyone . "'");
    if ($streams->num_rows > 0) {
        while ($row = $streams->fetch_assoc()) {
            echo "<option value='" . $row['Stream'] . "'>" . $row['Stream'] . "</option>";
        }
    }

    
}
echo "</select>
        <input type='text' id='search'";
if (!empty($idiota)) {
    echo " value='" . $idiota . "'";
}
echo " style='margin-left: 10px; height: 30px; font-size: 17px;' placeholder='Znajdź chuja'>
        <i class='fas fa-search' style='cursor: pointer; font-size: 25px; height: 30px; color: #2196F3;'></i>";


if ($check->num_rows > 0){$next = true;} else {$next = false;}
if ($result->num_rows > 0) {
    echo "<table>
        <tr>
        <th>Stream</th>
        <th>Nadający</th>
        <th>Wykluczony</th>
        <th>Typ</th>
        <th>Czas</th>
        <th>Godzina</th>
        <th>Data</th>
        <th>Powod</th>
        <th>Szczegoly</th>
        <th><i>Usuń</i></th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        ($row['Czas'] == "") ? $czas = "Forever" : $czas = $row['Czas'];
        ($row['Typ'] == "Perm") ? ($ban = "<span class='ban'>" . $row['Typ'] . "</span>") : $ban = $row['Typ'];
        echo "
        <tr><td>" . $row['Stream'] . "</td><td>" . $row['Nadajacy'] . "</td><td class='user" . $row['Id'] . "'>" . $row['Wykluczony'] . "</td><td>"
            . $ban . "</td><td>" . $czas . "</td><td>" . $row['Godzina'] . "</td><td>" . $row['Data'] . "</td><td>"
            . $row['Powod'] . "</td><td><i title='" . $row["Szczegoly"] . "'>?</i></td><td><i class='fas fa-trash-alt delete' id='" . $row['Id'] . "'></i></td></tr>
            ";
    }
    echo "</table><br>";
    if($page > 0 ){
        $prev = $page-1;
    echo "<span id='$prev' class='pager prev'>Poprzednia strona</span>";
    }
    if($next){
        $nextp = $page+1;
        echo "<span id='$nextp' class='pager next'>Następna strona</span>";
    }
} else {
    echo "<br>Brak wpisów";
}

?>
<script src="scripts/users.js"></script>
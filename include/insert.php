<?php
/*
$tak = mysqli_real_escape_string($mysqli, 'Oddaję do waszego użytku opcję przejścia na następną bądź poprzednią stronę na liście zablokowanych osób. W razie jakichkolwiek błędów/problemów proszę zgłaszać na discord: Bercik#9999');
if($mysqli->query("INSERT INTO `ogloszenia`(`Tresc`) VALUES ('$tak')")){
    echo "Tak";
} else {
    printf($mysqli->error);
}
<?php

if ($mysqli->connect_errno) {
    echo "DB CONNECTION ERROR";
} else {

    include "session.php";

    if ($_SESSION['login'] === false || !isset($_SESSION['login'])) {
        if (isset($_POST["push"])) {
            $user = mysqli_real_escape_string($mysqli, $_POST['login']);
            $password = mysqli_real_escape_string($mysqli, hash("sha256", $_POST["password"]));

            $check = $mysqli->query("SELECT * FROM `uzytkownicy` WHERE `User`='$user' AND `Password`='$password'");
            if ($check->num_rows > 0) {
                $row = $check->fetch_assoc();
                $_SESSION['user'] = $row['User'];
                $_SESSION['login'] = true;
                header("Refresh:0");
            } else {
                echo "<span style='color:red;display: flex;margin-left: 40%;'>Nieprawidłowa kombinacja loginu i hasła</span><br>";
                echo '<script>console.log(\'$password\')</script>';
            }
        }
?>
        <html>

        <head>
        </head>

        <body>
            <center>
                <form method="POST">
                    <input type="text" name="login" placeholder="Użytkownik" <?php if (!empty($user)) {
                                                                                    echo "value='$user'";
                                                                                } ?>>
                    <br>
                    <input type="password" name="password" placeholder="Hasło">
                    <br>
                    <input type="submit" name="push" value="Zaloguj">
                </form>
            </center>
        </body>

        </html>
<?php
    } else {
        echo $_SESSION['user'] . ", jesteś zalogowany. Odśwież stronę lub powróć na stronę główną :)";
    }
}
?>
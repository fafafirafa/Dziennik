<?php
include "include/connection.php";

if (mysqli_connect_errno()) {
  echo "DB CONNECTION ERROR";
} else { ?>
  <html>

  <head>

    <title>Dzienniczek banów</title>

    <link rel="icon" href="banhammer.png">

    <?php
    if ($_COOKIE["mode"] == "dark") {
      echo '<link id="style" rel="stylesheet" href="css/dark.css">';
    } else {
      echo '<link id="style" rel="stylesheet" href="css/light.css">';
    }
    ?>

    <link rel="stylesheet" href="css/window.css">

    <meta charset="UTF-8">

    <script src="scripts/jquery-3.5.1.min.js"></script>

    <!-- Font Awesone -->
    <script src="https://kit.fontawesome.com/5bbcc74a28.js" crossorigin="anonymous"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168631125-1"></script>

    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }

      gtag('js', new Date());

      gtag('config', 'UA-168631125-1');
    </script>

    <script src="scripts/remove.js"></script>
  </head>


  <body>
    <?php

    include 'include/notifaction.php';

    ?>
    <span title="Light/Dark mode" class="color" style="top:10;right:10;position:fixed;"><i style="cursor:pointer;" class="fas fa-adjust"></i></span>

    <input type="button" name="list" value="Lista zablokowanych">

    <div id="list"></div>

    <center>

      <form autocomplete="on">

        Nazwa streamera <br> <input type="text" name="stream"><br>

        Nadający &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        Wykluczony<br> <input type="text" name="give"> <input type="text" name="givento"><br>

        Typ wykluczenia <br>

        <label><input type="radio" name="type" value="0">Timeout</label> <label><input type="radio" name="type" value="1">Perm</label><br>

        <p id="to">Czas wykluczenia <sup title="Jeśli czas wykluczenia jest równy 300sekund, można wpisać 0 lub zostawić pole puste">?</sup><br>

          <input type="number" name="time" min="0" placeholder="300"></p>

        Data wykluczenia - Godzina wykluczenia <br><input type="date" name="date" value="<?php echo date("Y-m-d"); ?>"><input type="time" name="hour" value="<?php echo date("H:i"); ?>"> <br>

        Powód<br>

        <select name="what">

          <option value="Spam">Spam</option>

          <option value="Reklama">Reklama</option>

          <option value="Bycie idiotą">Bycie idiotą</option>

          <option value="Obraza">Obraza</option>

          <option value="Stuleja">Stuleja</option>

        </select>

        <br>

        Szczegóły<br>

        <textarea name="reason"></textarea><br>

        <input type="button" name="create" value="Utwórz wpis" disabled>

      </form>

    </center>


    <script src="scripts/serialize.js"></script>
    <script src="scripts/form.js"></script>
    <script src="scripts/ajax.js"></script>
    <script src="scripts/load.js"></script>
    <script src="scripts/cookies.js"></script>
    <script src="scripts/style.js"></script>

  </body>

  </html>

<?php
}

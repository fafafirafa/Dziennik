<?php

$info = $mysqli->query("SELECT * FROM `ogloszenia` ORDER BY Id desc LIMIT 1");
if ($info->num_rows > 0) {
    $row = $info->fetch_assoc();
        $last = $row['Id'];
        $message = $row['Tresc'];
}
if ($last !== $_COOKIE['changes'] || !isset($_COOKIE['changes'])) {
    echo '<div id="wrapper">
        <div class="content" >
        <div class="message">' . $message . '</div>
        <button onclick="removeElement(\'wrapper\')" style="background-color: #343a40; color: #ffffff;">
        OK
      </button></div>
</div>';
    setcookie('changes', $last, time() + (86400 * 366), "/");
}

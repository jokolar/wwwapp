<?php

$servername = "127.0.0.1";
$username = "kolarjos";
$password = "JednoObor-18.07.1965";
$dbname = "kolarjos";


// Vytvori spojeni s databazi
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Zkontroluje spojeni s Db
if ($conn->connect_error) {
    die("Spojení selhalo: " . $conn->connect_error);
}
?>
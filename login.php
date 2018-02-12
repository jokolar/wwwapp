<?php
session_start();

require_once("connect.php");
require_once("config.php");

$login = $conn->real_escape_string($_POST['login']);
$pass = $conn->string(sha1($_POST['password']));

$sql = "SELECT * FROM ".TABLE_ZAVODNIK." WHERE login = '".$login."' AND password = '".$pass."' LIMIT 1";
$vysledek = $conn->query($sql);
$row = $vysledek->fetch_assoc();
$pocet_zaznamu = mysqli_num_rows($vysledek);
$id_user = $row['id_zavodnik'];

if($pocet_zaznamu > 0) {
 /* session_register("ses_user");*/

  $_SESSION["ses_user"] = $id_user;
  $message[] = "ok*Jsi úspěšně přihlášen.";
  $message = implode("|", $message);
  Header("Location: index.php?page=prehled&message=".URLEncode($message));
  exit;
} else {
  $message[] = "abort*Chybné přihlašovací údaje!";
  $message = implode("|", $message);
  Header("Location: index.php?page=login_form&message=".URLEncode($message));
  exit;
}
?>

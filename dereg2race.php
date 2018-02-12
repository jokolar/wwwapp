<?php
session_start();
require_once("connect.php");
require_once("config.php");

$sql = "DELETE FROM ".TABLE_REGISTRACE." WHERE id_registrace = '".$_GET["id"]."' AND id_zavodnik = '".$_SESSION["ses_user"]."'";
$vysledek = $conn->query($sql);
if($vysledek) {
  $message[] = "ok*Registrace byla zrušena.";
  $message = implode("|", $message);
  Header("Location: index.php?page=prehled&message=".URLEncode($message));
  exit;
} else {
  $message[] = "abort*Registraci se nepodařilo zrušit.";
  $message = implode("|", $message);
  Header("Location: index.php?page=prehled&message=".URLEncode($message));
  exit;
}
?>

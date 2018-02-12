<?php
require_once("connect.php");
require_once("config.php");
/*overeni registrace - duplicity*/
$sql2 = "SELECT * FROM ".TABLE_REGISTRACE." WHERE id_zavodnik = '".$_POST['id_zavodnik']."' AND id_zavod = ".$_POST['id_zavod'];
$vysledek2 = $conn->query($sql2);
$pocet_zaznamu = mysqli_num_rows($vysledek2);

if($pocet_zaznamu > 0) {
  $message[] = "abort*Na tento závod jsi již přihlášen!";
  $message = implode("|", $message);
  Header("Location: index.php?page=prehled&message=".URLEncode($message));
  exit;
} else {
  $seznam_hodnot = "(
  '', 
  '".$_POST['id_zavodnik']."', 
  '".$_POST['id_zavod']."', 
  NOW() 
  )";
  /*NOW - casove razitko */

  /*validace prihlaseni k zavodu*/
  $sql = "INSERT INTO ".TABLE_REGISTRACE." VALUES $seznam_hodnot";
  $vysledek = $conn->query($sql);
  if($vysledek) {
    $message[] = "ok*Byl jsi úspěšně přihlášen na závod.";
    $message = implode("|", $message);
    Header("Location: index.php?page=prehled&message=".URLEncode($message));
    exit;
  } else {
    $message[] = "abort*Na závod se nepodařilo přihlásit.";
    $message = implode("|", $message);
    Header("Location: index.php?page=prehled&message=".URLEncode($message));
    exit;
  }
}

?>

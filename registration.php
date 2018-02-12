<?php
/*soubor neni inkludovan, proto znovu pripojeni k db   */
require_once("connect.php");
require_once("config.php");
/*nahodny generator alfanum hesel    */
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$pass = randomPassword();
/*data z formulare*/
$seznam_hodnot = "(
'', 
'".$_POST['jmeno']."', 
'".$_POST['prijmeni']."', 
'".$_POST['mobil']."', 
'".$_POST['email']."', 
'".$_POST['login']."', 
'".sha1($pass)."', 
'1'
)";

$sql = "INSERT INTO ".TABLE_ZAVODNIK." VALUES $seznam_hodnot";
$vysledek = $conn->query($sql);
/*odeslani emailu v pripade ulozeni dat z formulare do db*/
if($vysledek) {
  $to = $_POST['email'];
  $subject = "Prihlasovaci udaje";
  $txt = "Login: ".$_POST['login']." , Password: ".$pass;
  $headers = "From: yokolar@gmail.com";
  mail($to,$subject,$txt,$headers);
  
  $message[] = "ok*Tvá data byla úspěšně uložena. Na tvou e-mailovou adresu byly odeslány přihlašovací údaje.";
  $message = implode("|", $message);
  Header("Location: index.php?page=login_form&message=".URLEncode($message));
  exit;
} else {
  $message[] = "abort*Tvá data se nepodařilo uložit.";
  $message = implode("|", $message);
  Header("Location: index.php?page=registration_form&message=".URLEncode($message));
  exit; /*ukonceni skriptu po predchozim presmerovani na prihlasovaci stranku*/
}
?>

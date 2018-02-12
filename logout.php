<?php
session_start();

$_SESSION['ses_user']='';
unset($_SESSION['ses_user']);
session_destroy();

$message[] = "ok*Jsi úspěšně odhlášen";
$message = implode("|", $message);
Header("Location: index.php?page=login_form&message=".URLEncode($message));
exit;
?>

<?php
session_start();
require_once("connect.php");
require_once("config.php");
?>
<!DOCTYPE HTML>

<html>

<head>
    <link rel="stylesheet" href="bootstrap.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Registrace na závody</title>
  <link rel="stylesheet" href="styles.css" type="text/css" />
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script> <!--jquery - fce fadeout-->
  <script>
  $( document ).ready(function() {
    $( ".info_box" ).fadeOut( 3000, "linear" );
  });
  </script>
</head>

<body>

<?php
/* pokud z adresniho radku prijde zprava je vypsana*/
if(isset($_GET['message'])) {
  $messages = explode("|", URLDecode($_GET['message']));
  for($i=0; $i<count($messages); $i++) {
    list($class, $hlaska) = explode("*", $messages[$i]);
    echo "<div class=\"info_box ".$class."\">\n";
    echo $hlaska."\n";
    echo "</div>\n";
  }
}
?>

<?php
$page = isset($_GET['page']) ? $_GET['page'] : null;
switch($page):
    case "login_form": $incl = "login_form.php";
        break;
    case "registration_form": $incl = "registration_form.php";
        break;
    case "prehled":
        if (!empty($_SESSION["ses_user"])) {
            $incl = "prehled.php";
        }
        else
        {
            $incl = "login_form.php";
        }
        break;
    default: $incl = "login_form.php";
endswitch;

include($incl);
?>

</body>

</html>
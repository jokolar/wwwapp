<p></p>
<div class="container">
<div class="jumbotron">

<picture>
        
        <img src="images/kolo2.jpg" class="img-fluid img-thumbnail img-float-right" alt="obr�zek " />
</picture>
<!--<h2>Přehled</h2>-->
<h3>Přihlášení na závod</h3>
<form id="registrationform" method="post" action="reg2race.php">
      <label>Vyber závod:</label><br>

      <select name="id_zavod"><br>
<?php
/*omezeni rozbalovaci nabidky na aktualni zavody - zavody po terminu a zrusene se nenabizi*/
$sql = "SELECT * FROM ".TABLE_ZAVOD." WHERE status = 1 AND termin > CURDATE() ORDER BY termin ASC";
$vysledek = $conn->query($sql);
while ($row = $vysledek->fetch_assoc()) {
    echo "        <option value=\"".$row['id_zavod']."\">".$row['nazev']." (".Date("d.m.Y", Strtotime($row['termin'])).")</option>\n"; 
}
?>
      </select>
      <br />
      <input type="hidden" name="id_zavodnik" value="<?php echo $_SESSION["ses_user"]; ?>" /><br>
      <input type="submit" value="PŘIHLÁSIT NA ZÁVOD" name="go" />

</form>

<hr>
<h4>Seznam závodů:</h4>

<table class="table table-dark table-bordered table rounded-circle table-condensed table-hover table-striped">
  <tr>   
 <th>název</th>
    <th>datum</th>
    <th>stav</th>
    <th>URL</th>
    <th>reg.</th>
    <th>dereg.</th>
  </tr>
</div>
</div>
<?php
$sql = "SELECT * FROM ".TABLE_ZAVOD." ORDER BY termin ASC";
$vysledek = $conn->query($sql);
while ($row = $vysledek->fetch_assoc()) {
    echo "      <tr>\n";
    echo "        <td>".$row['nazev']."</td>\n";
    echo "        <td>".Date("d.m.Y H:i:s", Strtotime($row['termin']))."</td>\n";
    if(Strtotime($row['termin']) < Time()) {
      $stav = "Závod už proběhl";
    } else if($row['status'] == 0) {
      $stav = "Závod byl zrušen";
    } else {
      $stav = "ok";
    }
    echo "        <td>".$stav."</td>\n"; 
    echo "        <td>".($row['url'] != "" ? "<a href=\"".$row['url']."\" target=\"_blank\">odkaz</a>" : "")."</td>\n";
    $sql2 = "SELECT * FROM ".TABLE_REGISTRACE." WHERE id_zavodnik = '".$_SESSION["ses_user"]."' AND id_zavod = ".$row['id_zavod'];
    $vysledek2 = $conn->query($sql2);
    $row2 = $vysledek2->fetch_assoc();
    $pocet_zaznamu = mysqli_num_rows($vysledek2);
    echo "        <td>".($pocet_zaznamu > 0 ? "již registrován" : "neregistrován")."</td>\n"; 
    echo "        <td>".($pocet_zaznamu > 0 ? "<a href=\"dereg2race.php?id=".$row2['id_registrace']."\">zrušit registraci</a>" : "")."</td>\n"; 
    echo "      </tr>\n"; 
}

$sql3 = "SELECT * FROM ".TABLE_ZAVODNIK." WHERE id_zavodnik = '".$_SESSION["ses_user"]."'";
$vysledek3 = $conn->query($sql3)->fetch_assoc();
?>
</table>

Jsi přihlášen jako: <?php echo $vysledek3["login"]; ?> <a href="logout.php">Odhlásit</a>


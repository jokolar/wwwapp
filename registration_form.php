<p></p>
<div class="container">
<p></p>
<h2>Registrace</h2>
<!-- postovani vstupu z formulare do souboru registration - do db -->
<div class="jumbotron">
<picture>
        
        <img src="images/kolo2.jpg" class="img-fluid img-thumbnail img-float-right" alt="obr�zek " />
</picture>

<div class="form-group">
<form id="registrationform" method="post" action="registration.php">
      <label class"control-label">Uživatelské jméno:</label><br>
      <input type="text" name="login" value="" required />
      <br />
      <label class"control-label">Jméno:</label><br>
      <input type="text" name="jmeno" value="" required />
      <br />
      <label class"control-label">Příjmení:</label><br>
      <input type="text" name="prijmeni" value="" required />
      <br />
      <label class"control-label">E-mail:</label><br>
     <input type="text" name="email" value="" required />
      <br />
      <label class"control-label">Mobil:</label><br>
      <input type="mobil" name="mobil" value="" />
      <br /><br>
      <input type="submit" value="REGISTROVAT" name="go" />
</form>
</div>
<p>NEBO <a href="?page=login_form">prihlaseni</a></p>
</div>
</div>
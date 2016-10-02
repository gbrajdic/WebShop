<?php session_start() ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="shop.css">
<title>Untitled Document</title>
</head>

<body>

<div id="container">
<div id="menugore">
<a href="registracija.php" ><div id="registracija">Registriraj se!
</div></a>
<div class="border1">
</div>
<a href="ona.php" class="linkshop"><div id="ona">Ona
</div></a>
<div class="border1">
</div>
<a href="on.php" class="linkshop"><div id="on">On
</div></a>
<div class="border1">
</div>
<a href="multimedija.php" class="linkshop"><div id="multimedija">Multimedija
</div></a>
<div class="border1">
</div>
<a href="svezakucu.php" class="linkshop"><div id="svezakucu">Sve za kuću
</div></a>
<div class="border1">
</div>
<a href="vozila.php" class="linkshop"><div id="vozila">Vozila
</div></a>
<div class="border1">
</div>
<a href="ljubimci.php" class="linkshop"><div id="ljubimci">Ljubimci
</div></a>
<div class="border1">
</div>
<a href="ostalo.php" class="linkshop"><div id="ostalo">Ostalo
</div></a>
</div>
<div id="menulijevo">
<a href="prijava.php" class="linklijevo"><div id="prijava">Prijava
</div></a>
<div class="border2">
</div>
<a href="oglas.php" class="linklijevo"><div id="predajoglas">Predaj oglas
</div></a>
<div class="border2">
</div>
<a href="moj_profil.php" class="linklijevo"><div id="mojprofil">Moj profil
</div></a>
<div class="border2">
</div>
<a href="korisnici.php" class="linklijevo"><div id="korisnici">Korisnici
</div></a>
<div class="border2">
</div>
<a href="aukcije.php" class="linklijevo"><div id="aukcije">Aukcije
</div></a>
<div class="border2">
</div>
<a href="kontakt.php" class="linklijevo"><div id="kontakt">Kontakt
</div></a>
<div class="border2">
</div>
<div id="registerlijevo">
</div>
</div>
<?php $ses=0; if(!empty($_SESSION['LoggedIn'])){$ses=$_SESSION['LoggedIn'];}
if($ses==0){
echo "<form id='prijava' method='post' action='provjera_prijave.php'>";
echo "<fieldset id='pfield'>";
echo "<legend id='rubformeoglas' align='center'>Prijava</legend>";
echo "<p class='forme' id='prviinputoglas'>User*: </p><input  class='forma' name='usern' id='usern' type='text' size='30' required><br />";
echo "<p class='forme'>Password*:</p><input type='password' class='forma' name='passw' id='pass' size='30' required>";
echo "<input id='submit' class='forma' type='submit' value='Prijavi se'>";
}
else {
	
echo "<form id='prijava' method='post' action='odjava.php'>";
echo "<fieldset id='pfield'>";
echo "<legend id='rubformeoglas' align='center'>Odjava</legend>";
			
echo "<input id='submit' class='forma' type='submit' value='Odjavi se'>";}

?>
<p class="forme" id="pprijava">Nemaš račun?</p> <input id="psubmit" class="forma" type="button" onClick="parent.location='registracija.php'" value="Registriraj se!">
</fieldset>
<p><?php  if(isset($_GET['Msg'])){echo "<br><font color='black'>". $_GET['Msg'] ."</font>";} ?></p>

</form>

</div>
</body>
</html>
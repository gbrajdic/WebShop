<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="shop.css">
<title>Registracija</title>
<script type="text/javascript" src="provjera_reg_forme.js"></script>

<style>

table#tabela{
	margin: 0 125px 0 125px;
    float:left;
    width:565px;
    height: 525px;
    text-align:left;
    background-color:#F89000;
	color: #530000;
	font-family:Tahoma, Geneva, sans-serif;
font-size:14px;


}
li
{ 
margin-top:25px;
}


</style>

</head>

<body><?php 
if(empty($_SESSION['LoggedIn']) || empty($_SESSION['username']))  
 
     
	header("Location:http://localhost/website/prijava.php"); 

?>

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

<?php
$database = "Internet_oglasnik";
$host = "127.0.0.1";
$username = "root";
$password = "";

$db = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
echo "Nemoguce se spojiti na bazu...";
}




$rez = mysqli_query($db, "SELECT username, password, ime_i_prezime, adresa, mjesto, telefon, email, datum_rod, spol,slika FROM korisnik WHERE username='".$_SESSION['username']."'");
$pravi_rez=mysqli_fetch_array($rez);

echo "<table id=\"tabela\">";

echo "<tr><td style=\"text-align:center;\">"."<img src=" . "\"" .$pravi_rez['slika']."\"" .   "height=\"250\" width=\"220\"></td><td>" . "<ul><li>". "Username: " . $pravi_rez['username'] . "</li><li>" . "Ime i prezime: " . $pravi_rez['ime_i_prezime']. "</li><li>". "Adresa: " . $pravi_rez['adresa']. "</li><li>" . "Mjesto: " . $pravi_rez['mjesto']. "</li><li>" . "Telefon: " . $pravi_rez['telefon']. "</li><li>" . "E-mail: " . $pravi_rez['email']. "</li><li>" . "Datum rođenja: " . $pravi_rez['datum_rod']. "</li><li>" . "Spol: " . $pravi_rez['spol'] . "</li><br><li style=\"list-style: none;font-size:16px;\">"."<a href=\"editiranje_profila.php\" class=\"linkshop\">Uredi profil</a></li></ul>"."</td></tr></table>"



?>


</div>
</body>
</html>
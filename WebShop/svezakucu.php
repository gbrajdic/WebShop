
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="shop.css">

<style>

table
{
	color:#35241D;
	border-color:#02000E;
}
tr, td
{
	border-color:#02000E;
}

</style>
</head>

<body id="kucamain">


<div id="container">
<div id="menugoresvezakucu">
<a href="registracija.php" ><div id="registracijasvezakucu">Registriraj se!
</div></a>
<div class="border1svezakucu">
</div>
<a href="ona.php" class="linksvezakucu"><div id="ona">Ona
</div></a>
<div class="border1svezakucu">
</div>
<a href="on.php" class="linksvezakucu"><div id="on">On
</div></a>
<div class="border1svezakucu">
</div>
<a href="multimedija.php" class="linksvezakucu"><div id="multimedija">Multimedija
</div></a>
<div class="border1svezakucu">
</div>
<a href="svezakucu.php" class="linksvezakucu"><div id="svezakucu">Sve za kuću
</div></a>
<div class="border1svezakucu">
</div>
<a href="vozila.php" class="linksvezakucu"><div id="vozila">Vozila
</div></a>
<div class="border1svezakucu">
</div>
<a href="ljubimci.php" class="linksvezakucu"><div id="ljubimci">Ljubimci
</div></a>
<div class="border1svezakucu">
</div>
<a href="ostalo.php" class="linksvezakucu"><div id="ostalo">Ostalo
</div></a>
</div>
<div id="menulijevosvezakucu">
<a href="svezakucu.php?podkat=Kuhinja" class="llinksvezakucu"><div id="kuhinja">Kuhinja
</div></a>
<div class="border2svezakucu">
</div>
<a href="svezakucu.php?podkat=Kupaonica" class="llinksvezakucu"><div id="kupaonica">Kupaonica
</div></a>
<div class="border2svezakucu">
</div>
<a href="svezakucu.php?podkat=Dnevna soba" class="llinksvezakucu"><div id="dnevnasoba">Dnevna soba
</div></a>
<div class="border2svezakucu">
</div>
<a href="svezakucu.php?podkat=Spavaća soba" class="llinksvezakucu"><div id="spavacasoba">Spavaća soba
</div></a>
<div class="border2svezakucu">
</div>
<a href="svezakucu.php?podkat=Vrt" class="llinksvezakucu"><div id="vrt">Vrt
</div></a>
<div class="border2svezakucu">
</div>
<a href="svezakucu.php?podkat=Dekor" class="llinksvezakucu"><div id="dekor">Dekor
</div></a>
<div class="border2svezakucu">
</div>
<div id="registerlijevosvezakucu">
</div>
</div>
<div class="prikaz" id="prikazmulti">
<?php


$database = "Internet_oglasnik";
$host = "127.0.0.1";
$username = "root";
$password = "";
session_start();

$db = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
echo "Nemoguce se spojiti na bazu...";
}

if(isset($_GET['podkat'])){
$podkat=$_GET['podkat'];
$rez = mysqli_query($db, "SELECT id_oglasa , username, naslov, opis , zelj_cijena, poc_cijena ,vrijeme_zavrs ,slika_prva FROM oglas WHERE kategorija='KUCA' AND pod_kat='".$podkat."'");
}
else{
$rez = mysqli_query($db, "SELECT id_oglasa , username, naslov, opis , zelj_cijena, poc_cijena ,vrijeme_zavrs ,slika_prva FROM oglas WHERE kategorija='KUCA'");
}

$br=0;




while($row = mysqli_fetch_array($rez)) {
$flag=0;	

$rez_bida_arr=mysqli_query($db,"SELECT username, trenutna_cijena_bida FROM bida WHERE id_oglasa='".$row['id_oglasa']."' ");

$rez_bida=mysqli_fetch_array($rez_bida_arr);
$now=new DateTime();
$futureDate=new DateTime($row['vrijeme_zavrs']);

$interval = $futureDate->diff($now);

echo "<table border=\"1\">";

if(strtotime($row['vrijeme_zavrs'])<=strtotime('now') || $rez_bida['trenutna_cijena_bida']>=$row['zelj_cijena'] )
{
echo "<tr><td>".$row['naslov']."</td><td> Vrijeme isteka: " ."<br>". "Oglas je neaktivan!" . "</td></tr>";
$flag=1;		
}

else
{

echo "<tr><td>" .$row['naslov'] ."</td><td> Vrijeme isteka: " ."<br>". $interval->format("%d dana, %h sati, %i min, %s sek") . "</td></tr>";
}


echo "<tr><td>" ."<img src=" . "\"" .$row['slika_prva']."\"" .   "height=\"110\" width=\"135\" onmouseover=\"changeImg(this,true)\" onmouseout=\"changeImg(this,false)\" >" ."</td><td>" .  $row['opis'] ."</td></tr>" ;

echo "<tr><td>" . "Kupi odmah cijena: " . "<br>" .$row['zelj_cijena']." kn" . "</td><td>" . "Cijena zadnjeg bida" ."<br>". $rez_bida['username']   . "  ".  $rez_bida['trenutna_cijena_bida']  ." kn" ."</td></tr>";

if($flag===1)
{ 
	echo "<tr><td> Oglas je prodan useru:</td><td>".$rez_bida['username']." za  ".$rez_bida['trenutna_cijena_bida'] ." kn</td></tr>";
}
else{
echo "<tr><td><form method=\"post\" action=\"phpkupi_odma.php\">" . "<button type=\"submit\" value=" ."\"" . $row['id_oglasa']."\"".  "name=\"gumb1\">" . "Kupi odmah!" . "</button></form>" . "</td><td><form method=\"post\" action=\"phpbidaj.php\">" ."<input type=\"text\" name=\"bid\" id=\"bid\">" ."<button type=\"submit\" value=" ."\"" . $row['id_oglasa']."\"".  "name=\"gumb\" >" . "Bidaj!" . "</button></form></td></tr>";
}


echo "</table>";

}

	

mysqli_close($db);



?>
</div>

</div>






</body>
</html>
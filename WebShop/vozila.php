
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="shop.css">


<style>
table
{
	background-color:#806E49;
	color:#CCBF74;
	border-color:#000213;
}
tr, td
{
	border-color:#000213;
}
</style>
</head>

<body id="vozilamain">



<div id="container">
<div id="menugorevozila">
<a href="registracija.php" ><div id="registracijavozila">Registriraj se!
</div></a>
<div class="border1vozila">
</div>
<a href="ona.php" class="linkvozila"><div id="ona">Ona
</div></a>
<div class="border1vozila">
</div>
<a href="on.php" class="linkvozila"><div id="on">On
</div></a>
<div class="border1vozila">
</div>
<a href="multimedija.php" class="linkvozila"><div id="multimedija">Multimedija
</div></a>
<div class="border1vozila">
</div>
<a href="svezakucu.php" class="linkvozila"><div id="svezakucu">Sve za kuću
</div></a>
<div class="border1vozila">
</div>
<a href="vozila.php" class="linkvozila"><div id="vozila">Vozila
</div></a>
<div class="border1vozila">
</div>
<a href="ljubimci.php" class="linkvozila"><div id="ljubimci">Ljubimci
</div></a>
<div class="border1vozila">
</div>
<a href="ostalo.php" class="linkvozila"><div id="ostalo">Ostalo
</div></a>
</div>
<div id="menulijevovozila">
<a href="vozila.php?podkat=Auti" class="llinkvozila"><div id="auti">Auti
</div></a>
<div class="border2vozila">
</div>
<a href="vozila.php?podkat=Motori" class="llinkvozila"><div id="motori">Motori
</div></a>
<div class="border2vozila">
</div>
<a href="vozila.php?podkat=Bicikli" class="llinkvozila"><div id="bicikli">Bicikli
</div></a>
<div class="border2vozila">
</div>
<a href="vozila.php?podkat=Jahte" class="llinkvozila"><div id="jahte">Jahte
</div></a>
<div class="border2vozila">
</div>
<a href="vozila.php?podkat=Čamci" class="llinkvozila"><div id="camci">Čamci
</div></a>
<div class="border2vozila">
</div>
<a href="vozila.php?podkat=Oprema" class="llinkvozila"><div id="oprema">Oprema
</div></a>
<div class="border2vozila">
</div>
<div id="registerlijevovozila">
</div>
</div>
<div class="prikaz" id="prikazvozila">
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
$rez = mysqli_query($db, "SELECT id_oglasa , username, naslov, opis , zelj_cijena, poc_cijena ,vrijeme_zavrs ,slika_prva FROM oglas WHERE kategorija='VOZILA' AND pod_kat='".$podkat."'");
}
else{
$rez = mysqli_query($db, "SELECT id_oglasa , username, naslov, opis , zelj_cijena, poc_cijena ,vrijeme_zavrs ,slika_prva FROM oglas WHERE kategorija='VOZILA'");
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


echo "<tr><td>" ."<img src=" . "\"" .$row['slika_prva']."\"" .    "height=\"110\" width=\"200\" onmouseover=\"changeImg(this,true)\" onmouseout=\"changeImg(this,false)\" >" ."</td><td>" .  $row['opis'] ."</td></tr>" ;

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
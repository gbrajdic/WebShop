
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="shop.css">

<style>
table
{
	background-color:#F2CC22;
	color:#AF0000;
	border-color:#0D0D0D;
}
tr, td
{
	border-color:#0D0D0D;
}
</style>
</head>
<body id="ljubimcimain">



<div id="container">
<div id="menugoreljubimci">
<a href="registracija.php" ><div id="registracijaljubimci">Registriraj se!
</div></a>
<div class="border1ljubimci">
</div>
<a href="ona.php" class="linkljubimci"><div id="ona">Ona
</div></a>
<div class="border1ljubimci">
</div>
<a href="on.php" class="linkljubimci"><div id="on">On
</div></a>
<div class="border1ljubimci">
</div>
<a href="multimedija.php" class="linkljubimci"><div id="multimedija">Multimedija
</div></a>
<div class="border1ljubimci">
</div>
<a href="svezakucu.php" class="linkljubimci"><div id="svezakucu">Sve za kuću
</div></a>
<div class="border1ljubimci">
</div>
<a href="vozila.php" class="linkljubimci"><div id="vozila">Vozila
</div></a>
<div class="border1ljubimci">
</div>
<a href="ljubimci.php" class="linkljubimci"><div id="ljubimci">Ljubimci
</div></a>
<div class="border1ljubimci">
</div>
<a href="ostalo.php" class="linkljubimci"><div id="ostalo">Ostalo
</div></a>
</div>
<div id="menulijevoljubimci">
<a href="ljubimci.php?podkat=Psi" class="llinkljubimci"><div id="psi">Psi
</div></a>
<div class="border2ljubimci">
</div>
<a href="ljubimci.php?podkat=Mačke" class="llinkljubimci"><div id="macke">Mačke
</div></a>
<div class="border2ljubimci">
</div>
<a href="ljubimci.php?podkat=Ptice" class="llinkljubimci"><div id="ptice">Ptice
</div></a>
<div class="border2ljubimci">
</div>
<a href="ljubimci.php?podkat=Ostalo" class="llinkljubimci"><div id="ostalolj">Ostalo
</div></a>
<div class="border2ljubimci">
</div>
<a href="ljubimci.php?podkat=Hrana" class="llinkljubimci"><div id="hrana">Hrana
</div></a>
<div class="border2ljubimci">
</div>
<a href="ljubimci.php?podkat=Igračke" class="llinkljubimci"><div id="igracke">Igračke
</div></a>
<div class="border2ljubimci">
</div>
<div id="registerlijevoljubimci">
</div>
</div>
<div class="prikaz" id="prikazljubimci">
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
$rez = mysqli_query($db, "SELECT id_oglasa , username, naslov, opis , zelj_cijena, poc_cijena ,vrijeme_zavrs ,slika_prva FROM oglas WHERE kategorija='LJUBIMCI' AND pod_kat='".$podkat."'");
}
else{
$rez = mysqli_query($db, "SELECT id_oglasa , username, naslov, opis , zelj_cijena, poc_cijena ,vrijeme_zavrs ,slika_prva FROM oglas WHERE kategorija='LJUBIMCI'");
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
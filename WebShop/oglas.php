<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="shop.css">
<title>Untitled Document</title>
</head>

<body>
<?php
if(empty($_SESSION['LoggedIn']) || empty($_SESSION['username']))  
 
     
	header("Location:prijava.php"); // redirects 
 
?>

<script type="text/javascript">
var check=0;
function ChangeDropdowns(value){
	document.getElementById("CIJENA").innerHTML="";
	provjeri_cijenu();
    if(value=="ONA"){
        document.getElementById('she').style.display='block';
		document.getElementById('he').style.display='none';
		document.getElementById('multim').style.display='none';
		document.getElementById('sve_za_kucu').style.display='none';
		document.getElementById('voz').style.display='none';
		document.getElementById('pets').style.display='none';
		document.getElementById('podkat').style.display='block';
		document.getElementById('podkat_ostalo').style.display='initial';
    	document.getElementById('she').disabled= false;
		document.getElementById('he').disabled= true;
		document.getElementById('multim').disabled= true;
		document.getElementById('sve_za_kucu').disabled= true;
		document.getElementById('voz').disabled= true;
		document.getElementById('pets').disabled= true;
	
	
	}
	 if(value=="ON"){
        document.getElementById('she').style.display='none';
		document.getElementById('he').style.display='block';
		document.getElementById('multim').style.display='none';
		document.getElementById('sve_za_kucu').style.display='none';
		document.getElementById('voz').style.display='none';
		document.getElementById('pets').style.display='none';
		document.getElementById('podkat').style.display='block';
		document.getElementById('podkat_ostalo').style.display='initial';
		document.getElementById('she').disabled= true;
		document.getElementById('he').disabled= false;
		document.getElementById('multim').disabled= true;
		document.getElementById('sve_za_kucu').disabled= true;
		document.getElementById('voz').disabled= true;
		document.getElementById('pets').disabled= true;
	}
	if(value=="MULTIMEDIJA"){
        document.getElementById('she').style.display='none';
		document.getElementById('he').style.display='none';
		document.getElementById('multim').style.display='block';
		document.getElementById('sve_za_kucu').style.display='none';
		document.getElementById('voz').style.display='none';
		document.getElementById('pets').style.display='none';
		document.getElementById('podkat').style.display='block';
		document.getElementById('podkat_ostalo').style.display='initial';
		document.getElementById('she').disabled= true;
		document.getElementById('he').disabled= true;
		document.getElementById('multim').disabled= false;
		document.getElementById('sve_za_kucu').disabled= true;
		document.getElementById('voz').disabled= true;
		document.getElementById('pets').disabled= true;
	}
	if(value=="KUCA"){
        document.getElementById('she').style.display='none';
		document.getElementById('he').style.display='none';
		document.getElementById('multim').style.display='none';
		document.getElementById('sve_za_kucu').style.display='block';
		document.getElementById('voz').style.display='none';
		document.getElementById('pets').style.display='none';
		document.getElementById('podkat').style.display='block';
		document.getElementById('podkat_ostalo').style.display='initial';
		document.getElementById('she').disabled= true;
		document.getElementById('he').disabled= true;
		document.getElementById('multim').disabled= true;
		document.getElementById('sve_za_kucu').disabled= false;
		document.getElementById('voz').disabled= true;
		document.getElementById('pets').disabled= true;
	}
	if(value=="VOZILA"){
        document.getElementById('she').style.display='none';
		document.getElementById('he').style.display='none';
		document.getElementById('multim').style.display='none';
		document.getElementById('sve_za_kucu').style.display='none';
		document.getElementById('voz').style.display='block';
		document.getElementById('pets').style.display='none';
		document.getElementById('podkat').style.display='block';
		document.getElementById('podkat_ostalo').style.display='initial';
		document.getElementById('she').disabled= true;
		document.getElementById('he').disabled= true;
		document.getElementById('multim').disabled= true;
		document.getElementById('sve_za_kucu').disabled= true;
		document.getElementById('voz').disabled= false;
		document.getElementById('pets').disabled= true;
	
	}
	if(value=="LJUBIMCI"){
        document.getElementById('she').style.display='none';
		document.getElementById('he').style.display='none';
		document.getElementById('multim').style.display='none';
		document.getElementById('sve_za_kucu').style.display='none';
		document.getElementById('voz').style.display='none';
		document.getElementById('pets').style.display='block';
		document.getElementById('podkat').style.display='block';
		document.getElementById('podkat_ostalo').style.display='initial';
		document.getElementById('she').disabled= true;
		document.getElementById('he').disabled= true;
		document.getElementById('multim').disabled= true;
		document.getElementById('sve_za_kucu').disabled= true;
		document.getElementById('voz').disabled= true;
		document.getElementById('pets').disabled= false;
	}
	if(value=="OSTALO"){
        document.getElementById('she').style.display='none';
		document.getElementById('he').style.display='none';
		document.getElementById('multim').style.display='none';
		document.getElementById('sve_za_kucu').style.display='none';
		document.getElementById('voz').style.display='none';
		document.getElementById('pets').style.display='none';
		document.getElementById('podkat').style.display='none';
		document.getElementById('podkat_ostalo').style.display='none';
		document.getElementById('she').disabled= true;
		document.getElementById('he').disabled= true;
		document.getElementById('multim').disabled= true;
		document.getElementById('sve_za_kucu').disabled= true;
		document.getElementById('voz').disabled= true;
		document.getElementById('pets').disabled= true;
	}
}


function clearDefault(a){if(a.defaultValue==a.value){a.value=""}};

function provjeri_cijenu(){
var val=document.getElementById("selector").value;
var cijena=document.getElementById("zelj_cijena").value;
if(cijena.match(/^\s*()?((\d+([.,]\d\d)?)|([.,]\d\d))\s*$/)){ 


if (val=="OSTALO"){
document.getElementById("br").style.display="initial";		
document.getElementById("CIJENA").style.color="green";
document.getElementById("CIJENA").innerHTML="Ok"; check=1;
 }	

else
{
document.getElementById("br").style.display="none";	
document.getElementById("CIJENA").style.marginBottom="20px";
document.getElementById("CIJENA").style.color="green";
document.getElementById("CIJENA").innerHTML="Ok"; check=1;
	
}

 
}
 
else {
		if(cijena.length==0){document.getElementById("br").style.distpay="initial";	check=0; document.getElementById("CIJENA").innerHTML="";}
		
			
			
if (val=="OSTALO"){
document.getElementById("br").style.display="initial";	
document.getElementById("CIJENA").style.marginBottom="0px";
document.getElementById("CIJENA").innerHTML="";	
document.getElementById("CIJENA").style.color="red";
document.getElementById("CIJENA").innerHTML="Wrong"; check=0;
 }	

else
{
document.getElementById("br").style.display="initial";	
document.getElementById("CIJENA").style.marginBottom="0px";
document.getElementById("CIJENA").innerHTML="";
document.getElementById("CIJENA").style.color="red";
document.getElementById("CIJENA").innerHTML="Wrong"; check=0;
	

		}
	 }
	 
}




function provjeri_poc_cijenu(){
var val=document.getElementById("selector").value;
var cijena=document.getElementById("pocetna_cijena").value;
if(cijena.match(/^\s*()?((\d+([.,]\d\d)?)|([.,]\d\d))\s*$/)){ 


if (val=="OSTALO"){
document.getElementById("bra").style.display="initial";		
document.getElementById("POC_CIJENA").style.color="green";
document.getElementById("POC_CIJENA").innerHTML="Ok"; check=1;
 }	

else
{
	document.getElementById("bra").style.display="none";	
	document.getElementById("POC_CIJENA").style.marginBottom="20px";
document.getElementById("POC_CIJENA").style.color="green";
document.getElementById("POC_CIJENA").innerHTML="Ok"; check=1;
	
}

 
}
 
else {
		if(cijena.length==0){document.getElementById("bra").style.distpay="initial";	check=0; document.getElementById("POC_CIJENA").innerHTML="";}
		
			
			
if (val=="OSTALO"){
document.getElementById("bra").style.display="initial";	
document.getElementById("POC_CIJENA").style.marginBottom="0px";
document.getElementById("POC_CIJENA").innerHTML="";	
document.getElementById("POC_CIJENA").style.color="red";
document.getElementById("POC_CIJENA").innerHTML="Wrong"; check=0;
 }	

else
{
document.getElementById("bra").style.display="initial";	
document.getElementById("POC_CIJENA").style.marginBottom="0px";
document.getElementById("POC_CIJENA").innerHTML="";
document.getElementById("POC_CIJENA").style.color="red";
document.getElementById("POC_CIJENA").innerHTML="Wrong"; check=0;
	

		}
	 }
	 
}






function provjeri_sve_forme(){

if(!check) {document.getElementById("oglas").reset();}
	
	
}



</script>







<div class="containeroglas">
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
<form id="oglas" action="ubacivanje_oglasa.php" method="post" enctype="multipart/form-data">
<fieldset id="field">
<legend id="rubformeoglas" align="center">Oglas</legend>
<p class="forme" id="prviinputoglas">Izaberi kategoriju*: </p>
<select  class="forma" id="selector" name="select" onchange="ChangeDropdowns(this.value);" required>
<option value="">Select...</option>
<option value="ONA">Ona</option>
<option value="ON" >On</option>
<option value="MULTIMEDIJA">Multimedija</option>
<option value="KUCA">Sve za kuću</option>
<option value="VOZILA">Vozila</option>
<option value="LJUBIMCI">Ljubimci</option>
<option value="OSTALO">Ostalo</option>
</select>
<br>

<p class="forme" id="podkat" style="display:block">Izaberi podkategoriju*:</p> 
<select id="she" name="she" style="display:block"  class="forma" required>
<option value="">Select...</option>
<option>Cipele</option>
<option>Hlače</option>
<option>Majice</option>
<option>Kozmetika</option>
<option>Donje rublje</option>
<option>Modni dodaci</option>
</select>



<select id="he" name="he" style="display:none" class="forma" required>
<option value="">Select...</option>
<option>Cipele</option>
<option>Hlače</option>
<option>Majice</option>
<option>Kozmetika</option>
<option>Donje rublje</option>
<option>Modni dodaci</option>
</select>


 
<select id="multim" name="multim" style="display:none"  class="forma" required>
<option value="">Select...</option>
<option>Muzika</option>
<option>Video</option>
<option>Mobiteli</option>
<option>Tehinka</option>
<option>Kompjuteri</option>
<option>Ostalo</option>
</select>



<select id="sve_za_kucu" name="sve_za_kucu" style="display:none" class="forma" required>
<option value="">Select...</option>
<option>Kuhinja</option>
<option>Kupaonica</option>
<option>Dnevna soba</option>
<option>Spavaća soba</option>
<option>Vrt</option>
<option>Dekor</option>
</select>



<select id="voz" name="voz" style="display:none"  class="forma" required>
<option value="">Select...</option>
<option>Auti</option>
<option>Motori</option>
<option>Bicikli</option>
<option>Jahte</option>
<option>Čamci</option>
<option>Oprema</option>
</select>



<select id="pets" name="pets" style="display:none" class="forma" required>
<option value="">Select...</option>
<option>Psi</option>
<option>Mačke</option>
<option>Ptice</option>
<option>Ostalo</option>
<option>Hrana</option>
<option>Igračke</option>
</select>

<br id="podkat_ostalo" />

<p class="forme">Ime oglasa*:</p><input  class="forma" name="ime_ogl" type="text" size="30" required><br />
<p class="forme">Željena cijena*:</p><input  class="forma" id="zelj_cijena" name="zelj_cijena" type="text" size="15" value="u kunama" onclick="clearDefault(this)" onkeyup="provjeri_cijenu();" required><div class="forme_js" id="CIJENA"></div>
<br id="br"/>
<p class="forme">Početna cijena*:</p><input  class="forma" id="pocetna_cijena" name="pocetna_cijena" type="text" size="15" value="u kunama" onclick="clearDefault(this)" onkeyup="provjeri_poc_cijenu();" required><div class="forme_js" id="POC_CIJENA"></div><br id="bra"/>
<p class="forme">Slika*:</p><input  class="forma" name="slicica" type="file" accept="image/*"><br />




<p class="forme">Kratki opis:</p><textarea id="opis" name="opis" class="forma" rows="8" cols="35">
</textarea>


<input id="submit" class="forma" type="submit" value="Predaj oglas" onclick="provjeri_sve_forme();">
<p id="ovdje"></p>

</fieldset>


</form>

</div>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="shop.css">
<title>Registracija</title>
<script type="text/javascript" src="provjera_reg_forme.js"></script>

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
<form id="forma" action="reg_na_server.php" method="post"  enctype="multipart/form-data">
<fieldset id="field">
<legend id="rubforme" align="center">Registracija</legend>

<p class="forme" id="prviinput">Username*:</p><input  class="forma" id="user" name="username" type="text" onkeyup="provjeri_username()" size="30" required><div class="forme_js" id="USER"></div><br>

<p class="forme">Password*:</p> <input  class="forma" id="pass" name="password" onkeyup="provjeri_password()" type="text" size="30" required><div class="forme_js" id="pwd"></div><br>

<p class="forme">Ime*:</p> <input  class="forma" id="ime" name="Ime" onkeyup="provjeri_ime()" type="text" size="30" required><p class="forme_js" id="IME"></p><br>

<p class="forme">Prezime*:</p> <input  class="forma" id="prezime" name="Prezime" onkeyup="provjeri_prezime()" type="text" size="30" required><p class="forme_js" id="PREZIME"></p><br>

<p class="forme">Datum rođenja*:</p>
<select id="dan" class="forma" name="Dan" required>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>
<select id="mjesec" name="Mjesec" class="forma" required>
<option>Siječanj</option>
<option>Veljača</option>
<option>Ožujak</option>
<option>Travanj</option>
<option>Svibanj</option>
<option>Lipanj</option>
<option>Srpanj</option>
<option>Kolovoz</option>
<option>Rujan</option>
<option>Listopad</option>
<option>Studeni</option>
<option>Prosinac</option>
</select>
<select id="godina" name="Godina" class="forma" required>
<option>1920</option>
<option>1921</option>
<option>1922</option>
<option>1923</option>
<option>1924</option>
<option>1925</option>
<option>1926</option>
<option>1927</option>
<option>1928</option>
<option>1929</option>
<option>1930</option>
<option>1931</option>
<option>1932</option>
<option>1933</option>
<option>1934</option>
<option>1935</option>
<option>1936</option>
<option>1937</option>
<option>1938</option>
<option>1939</option>
<option>1940</option>
<option>1941</option>
<option>1942</option>
<option>1943</option>
<option>1944</option>
<option>1945</option>
<option>1946</option>
<option>1947</option>
<option>1948</option>
<option>1949</option>
<option>1950</option>
<option>1951</option>
<option>1952</option>
<option>1953</option>
<option>1954</option>
<option>1955</option>
<option>1956</option>
<option>1957</option>
<option>1958</option>
<option>1959</option>
<option>1960</option>
<option>1961</option>
<option>1962</option>
<option>1963</option>
<option>1964</option>
<option>1965</option>
<option>1966</option>
<option>1967</option>
<option>1968</option>
<option>1969</option>
<option>1970</option>
<option>1971</option>
<option>1972</option>
<option>1973</option>
<option>1974</option>
<option>1975</option>
<option>1976</option>
<option>1977</option>
<option>1978</option>
<option>1979</option>
<option>1980</option>
<option>1981</option>
<option>1982</option>
<option>1983</option>
<option>1984</option>
<option>1985</option>
<option>1986</option>
<option>1987</option>
<option>1988</option>
<option>1989</option>
<option>1990</option>
<option>1991</option>
<option>1992</option>
<option>1993</option>
<option>1994</option>
<option>1995</option>
<option>1996</option>
<option>1997</option>
<option>1998</option>
<option>1999</option>
<option>2000</option>
<option>2001</option>
<option>2002</option>
<option>2003</option>
<option>2004</option>
<option>2005</option>
<option>2006</option>
<option>2007</option>
<option>2008</option>
<option>2009</option>
<option>2010</option>
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2014</option>
</select><br>

<p class="forme">Telefon/Mob:</p> <input  class="forma" id="tel" name="Telefon" onkeyup="provjeri_telefon()" type="text" size="30"><div class="forme_js" id="telefon"></div><br>

<p class="forme">Adresa:</p> <input  class="forma" id="adresa" name="Adresa" onkeyup="provjeri_adresu()" type="text" size="30"><p class="forme_js" id="adress"></p><br>

<p class="forme">Mjesto*:</p> <input  class="forma" id="mjesto" name="Mjesto" onkeyup="provjeri_mjesto()" type="text" size="30" required><p class="forme_js" id="MJESTO"></p><br>

<p class="forme">E-mail*:</p> <input  class="forma" id="mail" name="Mail"  onkeyup="provjeri_email()" type="text" size="30" required><p class="forme_js" id="MAIL"></p><br>

<p class="forme">Spol*:</p> <input  id="spolm" name="Spol" class="forma" type="radio" size="30" name="sex" required>
<p class="forma">Muško</p>
<input  id="spolz" name="Spol" class="forma" type="radio" size="30" name="sex" required>
<p class="forma" id="pspol">Žensko</p><br>

<p class="forme">Slika:</p><input  class="forma" name="Slika" type="file" accept="image/*"><br />

</textarea>

<input id="submit" name="submitbtn" class="forma" type="submit" onclick="provjeri_sve()"  value="Završi registraciju">

<p id="tu"><?php if(!isset($_GET['Message'])) echo "* - obavezna polja"; else{ if(isset($_GET['Message'])){echo "<br><font color='red'>". $_GET['Message'] . "</font>";}} ?></p>
</fieldset>


</form>

</div>
</body>
</html>
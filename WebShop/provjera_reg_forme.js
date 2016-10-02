  var check_all;
  var check_pass;
  var check_adress=1;
  var check_email;
  var check_ime;
  var check_prezime;
  var_check_tel;
  var check_mjesto;
  var check_user;
  
  
  function provjeri_username(){
  
  check_user=0;
  var user=document.getElementById("user").value;
  
  if(user.match(/^[a-zA-Z0-9]+[._]?[a-zA-Z0-9]+$/) && user.length>2) 
	  {
		  document.getElementById("USER").style.color="green";
		  document.getElementById("USER").innerHTML="Ok"; 
		  document.getElementById("USER").style.marginBottom="0px";
		  check_user=1;
	  }	
  
  else {
	  
		  if (user.length==0) {document.getElementById("USER").innerHTML="";check_user=0;
		  document.getElementById("USER").style.marginBottom="20px";}
	  
		  else
			  {
				  document.getElementById("USER").style.color="red"; document.getElementById("USER").innerHTML="Wrong";
				  document.getElementById("USER").style.marginBottom="0px";
				  document.getElementById("tu").innerHTML="eg. John_Smith"; check_user=0;
			  }
	   }
	  
	  
  }
  
  
  
  function provjeri_password(){
  
  check_pass=0;
  var pass=document.getElementById("pass").value;
  
  if(pass.match(/(\D|\d){6}/)){document.getElementById("pwd").style.color="red";document.getElementById("pwd").innerHTML="Weak";check_pass=1 ;document.getElementById("pwd").style.marginBottom="0px";}
  else {
	  
	  if (pass.length<7) { document.getElementById("pwd").innerHTML="";document.getElementById("pwd").style.marginBottom="20px";}
	   if (pass.length==0) {document.getElementById("pwd").innerHTML="";check_pass=0;
		  document.getElementById("pwd").style.marginBottom="20px";}
	  
	  document.getElementById("tu").innerHTML="Minimalno 6 znakova."; check_pass=0;}	
  
  if(pass.match(/(\D|\d){8}/) || pass.match(/(\D|\d){9}/) || pass.match(/(\D|\d){10}/)){document.getElementById("pwd").style.color="#E1E100"; document.getElementById("pwd").innerHTML="Moderate";check_pass=1;}
  
  if(pass.match(/(\D|\d){11}/) || pass.match(/(\D|\d){12}/) || pass.match(/(\D|\d){13}/)){document.getElementById("pwd").style.color="green";document.getElementById("pwd").innerHTML="Strong";check_pass=1;}
  
  }
  
  
  
  function provjeri_telefon(){
	  
  check_tel=1;
  var telefon=document.getElementById("tel").value;
  
  if(telefon.match(/\D/) || (telefon.length<9) && (telefon.length>0)) 
	  {
	  document.getElementById("telefon").style.color="red";
	  document.getElementById("telefon").innerHTML="Wrong"; 
	  document.getElementById("tu").innerHTML="eg. 0982331455";check_tel=0;
	  document.getElementById("telefon").style.marginBottom="0px";
	  }
	  
  else {
	  
		   if(telefon.length==0){document.getElementById("telefon").innerHTML="";check_tel=1;document.getElementById("telefon").style.marginBottom="20px";}
	   
		  else 	{
					  document.getElementById("telefon").style.color="green"; 
					  document.getElementById("telefon").innerHTML="Ok"; 
					  check_tel=1;
				  }
		  
	  }	
  
  
  
  }
  
  
  
  function provjeri_email(){
	  
  check_email=0;
  var mail=document.getElementById("mail").value;
  
  if (mail.match(/\w+([_.-]{0,1}\w+)@(yahoo\.com|gmail\.com|net\.hr|math\.hr|outlook\.com|hotmail\.com)/) && ((mail.indexOf("@yahoo.com")!=-1) || (mail.indexOf("@gmail.com")!=-1) || (mail.indexOf("@net.hr")!=-1) || (mail.indexOf("@math.hr")!=-1)) || (mail.indexOf("@outlook.com")!=-1) ) 
  
	  {
	  
		  document.getElementById("MAIL").style.color="green";
		  document.getElementById("MAIL").innerHTML="Ok"; 
		  
		  check_email=1;
	  }
		  
		  
  else	{
	  document.getElementById("MAIL").style.marginBottom="0px";
			  document.getElementById("MAIL").style.color="red"; 
			  document.getElementById("MAIL").innerHTML="Wrong";
			  document.getElementById("tu").innerHTML="eg. you@where.com"; check_email=0;
		  }	
		  
 
  }
  
  
  function provjeri_ime(){
	  
  check_ime=0;
  var ime=document.getElementById("ime").value;
  
  if ( ime.match(/^[A-Za-z\u017d\u0110\u0160\u0106\u010c ][a-z\u010D\u0107\u0161\u0111\u0173]/) && ime.match(/\D$/)) {document.getElementById("IME").style.color="green"; document.getElementById("IME").innerHTML="Ok"; check_ime=1;document.getElementById("IME").style.marginBottom="0px";}
  else {
	  
	  if(ime.length==0){document.getElementById("IME").innerHTML="";check_ime=1;
	  document.getElementById("IME").style.marginBottom="20px";}
	  
	  else
  {document.getElementById("IME").style.color="red"; document.getElementById("IME").innerHTML="Wrong"; document.getElementById("tu").innerHTML="eg. Pero";document.getElementById("IME").style.marginBottom="0px"; check_ime=0;}
  
  }
	  
  }
  
  function provjeri_prezime(){
	  
  check_prezime=0;
  var prezime=document.getElementById("prezime").value;
  if ( prezime.match(/^[A-Za-z\u017d\u0110\u0160\u0106\u010c ][a-z\u010D\u0107\u0161\u0111\u0173]/) && prezime.match(/\D$/)) {document.getElementById("PREZIME").style.color="green";document.getElementById("PREZIME").innerHTML="Ok"; check_prezime=1;
  document.getElementById("PREZIME").style.marginBottom="0px";}
  else {
	  
	  if(prezime.length==0){document.getElementById("PREZIME").innerHTML="";check_prezime=1;
	  document.getElementById("PREZIME").style.marginBottom="20px";}
	  
	  else{
	  document.getElementById("PREZIME").style.color="red"; document.getElementById("PREZIME").innerHTML="Wrong"; document.getElementById("PREZIME").style.marginBottom="0px";
	  document.getElementById("tu").innerHTML="eg. Perić"; check_prezime=0;
	  }
	  }
	  
  }
  
  function provjeri_mjesto(){
	  
  check_mjesto=0;
  var mjesto=document.getElementById("mjesto").value;
  if ( mjesto.match(/^[A-Za-z\u017d\u0110\u0160\u0106\u010c ][a-z\u010D\u0107\u0161\u0111\u0173]/) && mjesto.match(/\D$/)) {document.getElementById("MJESTO").style.color="green";document.getElementById("MJESTO").innerHTML="Ok"; check_mjesto=1;document.getElementById("MJESTO").style.marginBottom="0px";}
  
  
  
  else {
	  
	  if(mjesto.length==0){document.getElementById("MJESTO").innerHTML="";document.getElementById("MJESTO").style.marginBottom="20px";
	  check_mjesto=1;}
	  else{
	  document.getElementById("MJESTO").style.color="red";
	  document.getElementById("MJESTO").innerHTML="Wrong";document.getElementById("MJESTO").style.marginBottom="0px";
	  
	  document.getElementById("tu").innerHTML="eg. Zagreb"; check_mjesto=0;
	  
	  }
	  }
	  
  }
  
  function provjeri_adresu(){
  	
  
  var adresa=document.getElementById("adresa").value;
  if ( adresa.match(/^[A-Za-z\u017d\u0110\u0160\u0106\u010c](.*?)[\s](\d|\D)+$/)) {document.getElementById("adress").style.color="green";document.getElementById("adress").innerHTML="Ok"; check_adress=1;}
  
  else {
	  
	  if(adresa.length==0){document.getElementById("adress").innerHTML=""; check_adress=1;document.getElementById("adress").style.marginBottom="20px";}
	  
	  
	  else{
		  document.getElementById("adress").style.marginBottom="0px";
	 	 document.getElementById("adress").style.color="red";
		 document.getElementById("adress").innerHTML="Wrong";	
		 document.getElementById("tu").innerHTML="eg. Ilica 30";
	 	 check_adress=0;
	  
	 	 }
  }
  
  
  }
  
  
  function provjeri_sve(){
	  
	  
  check_all=check_pass && check_ime && check_prezime && check_mjesto && check_adress && check_email && check_tel && check_user;
  if(!check_all){ document.getElementById("forma").reset(); document.getElementById("pwd").innerHTML=""; document.getElementById("telefon").innerHTML="";document.getElementById("adress").innerHTML="";document.getElementById("IME").innerHTML=""; document.getElementById("PREZIME").innerHTML="";document.getElementById("MJESTO").innerHTML="";document.getElementById("USER").innerHTML="";document.getElementById("MAIL").innerHTML="";document.getElementById("adress").style.marginBottom="20px";
 document.getElementById("pwd").style.marginBottom="20px";document.getElementById("telefon").style.marginBottom="20px";
 document.getElementById("IME").style.marginBottom="20px";document.getElementById("PREZIME").style.marginBottom="20px";
 document.getElementById("MJESTO").style.marginBottom="20px";document.getElementById("MAIL").style.marginBottom="20px";
 document.getElementById("USER").style.marginBottom="20px";}
  
  }
<!doctype html>
<html>
<head class="header">
 <meta charset="utf-8">
 <title>Authentification</title>
 <style>
 
 </style>
 
 <script src="jquery-3.4.1.min.js"></script>
 
 <link rel="stylesheet" href="index.css" />
</head>
<body>

<section id='span' class="navebar">
<p><a class='app'href="connexion.php" >Se Connecter</a>
<a class='app' href="inscription.php" >S'inscrire</a></p>

		<h1 id='h1' style="color:white;"> FREE immobilier</h1>
</section>
<header>
<img id ='b' src  ="icon4.png"/>

<img id ='b' src  ="icon4.png"/>
<img id ='b' src  ="index.4jpg.jpg"/>
<img id ='b' src  ="icon4.png"/>
<img id ='b' src  ="icon4.png"/>

	</header>
	
	<div id="div2" >
		<form method="post" action="recherche.php" >
		
				
				<select id="res" class="a"  name="type" placeholder="Donner le type du bien ">
				<option>Immeuble</option><option>Appartement</option>
				</select>
				
				<input id='input' onKeyup="ndeye();" class="a"   type="text" name="adresse" placeholder="Donner l'adresse du Bien" />
				
				<input  id='input2' class="a" type="text" name="prix" placeholder="Donner le prix du Bien "/>
				<input   type="submit" value="Rechercher"  id="sub" />
		</form>

	
	<div id ='i' style="background-color:white;margin-top:0px;"></div>
		</div>
	<?php
	$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
	$req='select * from bien where etat like "disponible" ';
	$res=$con->query($req);
	while($resultat=$res->fetch())
	{
		$i=$resultat["image"];
		echo'<div id="di"  >';
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
		
		echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
		echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
		echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
		echo'<form method="post" action="detail.php"  style="margin-left:60px;margin-top:5px;" > ';
		echo'<input type="hidden" name="decription" value='.$resultat["description"].' />
		     <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
			 <input type="hidden" name="image" value='.$resultat["image"].' />
			 <input id="su" type="submit" value="Plus d\'informations" style="background:aqua;color:navy;
			 border-radius:10px;margin-top:10px;margin-bottom:10px;font-weight:bold;height:30px;"/></form>'; 
		echo"</div>";
	}
	?>
	
	
	<footer id="div1" style="height:20%;"><h2 style=" color:white;
	">Qui sommes nous ?</h2>
<p id="id111" style=" color:white;">Nous représentons une agence sis à sacré coeur  3
 villa 9343 VDN Dakar ,mermoz sacré coeur .
 Nous detenons des biens(immeubles et appartements à louer ).Pour plus d'informations
 ,vous pouvez aussi nous suivre sur :<br>
 <img id="logo" src="1200px-WhatsApp.svg.png">+221 77 356 78 89
 <img id="logo" src="facebook.png"> FREE Immobilier
 
 <img id="logo" src="twitter.png">FREE Immobilier
 
 </p></footer>

</body>

<script>
/*var input=document.getElementById("input");
var div2=document.getElementById("div2");
var di=document.getElementById("i");
function ndeye()
{
var xh= new XMLHttpRequest();
xh.open('GET','serveur2.php?rec='+input.value);
xh.send();
xh.onreadystatechange=function()
{
if(xh.readyState==4)
{
	if(xh.status==200)
	{
		//alert(xh.responseText);
		//var h1 = document.getElementById('div');
		
		di.innerHTML=xh.responseText;
		
		


var li=document.getElementsByTagName('li');
//var l=li.length;
for(var k in li)
{
	li[k].onclick=function(e)
	{
	input.value=this.innerHTML;
	di.style.visibility='hidden';
	div2.style.height='2%';
	}
}







	}
}
};	
};
*/
</script>



</html>
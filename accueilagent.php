<?php
session_start();

if($_SESSION['login']==NULL)
	header("Location:connexion.php");
?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Accueil agent</title>
 <link rel="stylesheet" href="admine.css" />
</head>
<body >
<section id='span'>
<a class="app"  href="cherch.php"> Recherche</a>

		<h1 id='h11'>FREE immobilier</h1>
		
</section>
<header>
	
<img id ='b' src  ="icon4.png"/>

<img id ='b' src  ="icon4.png"/>
<img id ='b' src  ="index.4jpg.jpg"/>
<img id ='b' src  ="icon4.png"/>
<img id ='b' src  ="icon4.png"/>

	</header>

		<section id='span'>
		<a  class="gfi" class="ch" href="profil.php" > Modifier profil </a>
        <a  class="gfi" class="ch" href="reservation1.php" >Réservations </a>
		<a class="gfi"  class="ch" href="location1.php" >location </a>
		<a  class="gfi" class="ch"  href="bien1.php" > Biens</a>
		<a class="gfi" href="ajouter1.php" >Ajout de bien  </a>
		<a class="gfi" class="ch"  href="connexion.php"> Se déconnecter</a>
		</section>
	
<h2 id='bb'>La liste de tous les biens </h2>
	
		<?php
	$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
	$req='select * from bien ';
	$res=$con->query($req);
	while($resultat=$res->fetch())
	{$i=$resultat['image'];
		echo'<div id="di" >';
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
		
		echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
		echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
		echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
		echo'<form method="post" action="detail.php"  style="margin-left:60px;margin-top:5px;" > ';
		echo'<input type="hidden" name="decription" value='.$resultat["description"].' />
		     <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
			 <input type="hidden" name="image" value='.$resultat["image"].' />
			 <input type="submit" value="Plus d\'informations" style="background:lightblue;color:navy;
			 border-radius:10px;margin-top:10px;margin-bottom:10px;font-weight:bold;height:30px;"/></form>'; 
		echo"</div>";
	}
	?>
	
</body>
</html>
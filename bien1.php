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
 <script src="jquery-3.4.1.min.js"></script>
 <link rel="stylesheet" href="admine.css" />
</head>
<body >
<section id='span'>
<a class="app"  href="rec.php"> Recherche</a>
<a class="app"  href="accueilagent.php"> Retour</a>
		<h1 id='h11'> FREE immobilier</h1>
		
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
        <a  class="gfi" href="reservation1.php" >Réservations </a>
		<a class="gfi" href="location1.php" >locations </a>
		<a id="kal"  class="gfi" href="bien1.php" > Biens</a>
		<a  class="gfi" href="ajouter1.php" >Ajout de bien  </a>
		<a class="gfi" href="connexion.php"> Se déconnecter</a>
		</section>
	
	<?php
	$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
	$b='select * from bien ';
	$a=$con->query($b);
	while($res=$a->fetch())
	{
		$i=$res['image'];
		echo"<div id='di'>";
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
		echo'<span class="id" >Numéro du Bien:</span><span class="res">'.$res["idBien"].'</span>';
		echo'<form method="post" action="sup1.php" >
		<br>
		<input type="hidden" name="idBien" value="'.$res["idBien"].'" />
		<input type="submit" value="Supprimer" style="background:red;color:white;font-size:30px;border-radius:10px;margin-left:80px;"/>
		</form> <br>';
	    
		echo'<form method="post" action="modifier1.php" >
		<input type="hidden" name="idBie" value="'.$res["idBien"].'" />
		<input type="hidden" name="eta" value="'.$res["etat"].'" />
		<input type="hidden" name="adress" value="'.$res["adresse"].'" />
		<input type="hidden" name="pri" value="'.$res["prix"].'" />
		<input type="hidden" name="descriptio" value="'.$res["description"].'" />
		<input type="hidden" name="imag" value="'.$res["image"].'" />
		
		<input type="submit" value="Modifier" style="background:rgb(10,0,110);font-size:30px;border-radius:10px;margin-left:97px;color:white;margin-bottom:15px;margin-top:5px;"/></form></div>';
	
	
	
	
	}
	
	?>
	
	 
	
	<script>
	$('input').click(function()
	{
		if($(this).val()=="Supprimer")
	return confirm("Voulez vous supprimer ?");
	}
	);
	</script>	 
	
</body>
</html>
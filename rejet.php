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
<body  id="body">
<section id='span'>
<a class="app"  href="index.php"> Accueil</a>
<a class="app"  href="accueilagent.php"> Retour</a>
		<h1 id='h11'>Agence FREE immobilier</h1>
		
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
		<a class="gfi" href="location1.php" >location </a>
		<a  class="gfi" href="bien1.php" > Biens</a>
		<a class="gfi" href="ajouter1.php" >Ajout de bien  </a>
		<a class="gfi" href="connexion.php"> Se déconnecter</a>
		</section>
	
	
	
	<?php
			$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
		
			if(isset($_POST["etat"]))
			{
				$id=$_POST["etat"];
				
				$r='delete from reservation where idReservation='.$id.'';
				$req=$con->exec($r);
				header("location:reservation1.php"); 
			}
				
		?>
</body>
</html>
	
</body>
</html>
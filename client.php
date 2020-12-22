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
 <link rel="stylesheet" href="styl.css" />
</head>
<body  >
<section id='span'>
<a class="app"  href="admin.php"> Retour</a>
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
        <a  class="gf" href="reservation.php" >Réservations </a>
		<a class="gf" href="location.php" >locations </a>
		<a  class="gf" href="bien.php" > Biens</a>
		<a class="gf" href="agent.php" > Gestion Agents</a>
		<a id="kal" class="gf" href="client.php" > Gestion Clients</a>
		<a class="gf" href="ajouter.php"> Ajout de bien</a>
		</section>
	<?php
		$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
		$a='SELECT * FROM compte c join client a where a.idClient=c.login';
	    $re=$con->query($a);
		echo"<table><thead> <th>pseudo</th> <th>Prenom</th> <th>Nom</th> <th>Adresse</th> <th>Téléphone</th> <th>Etat Actuel</th> <th>Modifier Etat</th> </thead>";
		while($res=$re->fetch())
		{
			echo"<tr>";
			echo'<td>'.$res["idClient"].' </td>';
			echo'<td>'.$res["prenom"].' </td>';
			echo'<td>'.$res["nom"].' </td>';
			echo'<td>'.$res["adresse"].' </td>';
			echo'<td> '.$res["telephone"].'</td>';
			echo'<td> '.$res["etat"].'</td>';
			echo'<td>';
			if($res["etat"]=="actif")
		{
			echo"	<form  method='post' action='desactiver.php' >";
		echo '<input type="hidden" name="pseudo" value='.$res["login"].' />';
		echo '<input type="hidden" name="etat" value="oui" />';
		echo "<span><input type='submit'  value='Désactiver' style='background:red;color:white;width:120px;height:40px;border-radius:10px;font-size:20px; ' />	</span>
		</form>";
		}
		else
		{
			echo"	<form method='post' action='desactiver.php' >";
		echo '<input type="hidden" name="pseudo" value='.$res["login"].' />';
		echo '<input type="hidden" name="etat" value="non" />';
		echo "<span><input type='submit'  value='Activer' style='background:green;color:white;width:120px;height:40px;border-radius:10px;font-size:20px; ' />	</span>
		</form>";
		 }       
			
			
			
			echo"'</td></tr>";
		}
		echo"</table>";
			
	?>
	
	
	<script>
	$('input').click(function()
	{
	if($(this).val()=="Désactiver")
	return confirm("Voulez vous vraiment le désactiver ?");
	}
	);
	</script>


</body>
</html>
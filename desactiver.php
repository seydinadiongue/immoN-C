
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Accueil agent</title>
 <link rel="stylesheet" href="styl.css" />
  <link rel="stylesheet" href="bien.css" />
</head>
<body >
	<header>
		<h1>SEN ESPACE LOGEMENT</h1>
	</header>
	<?php
		$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
		$a='SELECT * FROM compte c join agent a where a.idAgent=c.login';
	    $re=$con->query($a);
		echo"<table><thead> <th>pseudo</th> <th>Prenom</th> <th>Nom</th> <th>Adresse</th> <th>Téléphone</th> <th>Etat Actuel</th> <th>Modifier Etat</th> </thead>";
		while($res=$re->fetch())
		{
			echo"<tr>";
			echo'<td>'.$res["idAgent"].' </td>';
			echo'<td>'.$res["prenom"].' </td>';
			echo'<td>'.$res["nom"].' </td>';
			echo'<td>'.$res["adresse"].' </td>';
			echo'<td> '.$res["telephone"].'</td>';
			if($res["etat"]=="actif")
		{
			echo"	<form  method='post' action='etat.php' >";
		echo '<input type="hidden" name="pseudo" value='.$res["login"].' />';
		echo '<input type="hidden" name="etat" value="oui" />';
		echo "<span><input type='submit'  value='Désactiver' style='background:green;color:white;font-weight:bold;width:120px;height:40px;border-radius:20px;font-size:20px; ' />	</span>
		</form>";
		}
		else
		{
			echo"	<form method='post' action='etat.php' >";
		echo '<input type="hidden" name="pseudo" value='.$res["login"].' />';
		echo '<input type="hidden" name="etat" value="non" />';
		echo "<span><input type='submit'  value='Activer' style='background:red;color:white;font-weight:bold;width:120px;height:40px;border-radius:20px;font-size:20px; ' />	</span>
		</form>";
		 }       
			
			
			
			echo"</tr>";
		}
		echo"</table>";
			
	


if(isset($_POST['etat']) and isset($_POST['pseudo']))
{
	$pseudo = $_POST['pseudo'];
	$etat = $_POST['etat'];
	$activer = 'actif';
	$desactiver = 'non actif';
	if($etat=="oui")
	{
		$req2="update compte set etat='$desactiver' where login like '$pseudo'";
		$res=$con->exec($req2);
		if($res != -1)
		{
			echo "reussi ";
			header("Location:client.php");
		}
		
	}
	else if ($etat=="non")
	{
		$req2="update compte set etat='$activer' where login like '$pseudo'";
		$res=$con->exec($req2);
		if($res != -1)
		{
			echo "reussi ";
			header("Location:client.php");
		}
		
	}
}
?>
</body>
</html>
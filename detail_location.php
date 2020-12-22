<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>plus d'informations</title>
 <link rel="stylesheet" href="index.css" />
</head>
<body >
<header>
		<h1>SEN ESPACE LOGEMENT</h1>
	</header>
	<?php
	$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
	$req='select * from location where idLoc='.$_POST["loc"].'   ';
	$res=$con->query($req);
	$resultat=$res->fetch();
		echo'<div id="dh" style="border:0px solid black;">';
		echo'<img src='.$resultat["image"].' id="dim" /><br/>';
		echo'<span class="id">Date Entrée:</span><span class="res">'.$resultat["dateEntree"].'<span><br/>';
		echo'<span class="id">Date Sortie:</span><span class="res">'.$resultat["dateSortie"].'</span><br/>';
		echo'<span class="id">Numéro du Bien:</span><span class="res">'.$resultat["idBien"].'</span><br/>';
		echo'<span class="id">Montant Arriéré:</span><span class="res">'.$resultat["arriere"].'</span>';
		echo"</div>";
	?>

</body>
</html>
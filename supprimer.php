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
	<div>
	    <form method="post" action="" id="f2">
		    <div>
				<label>Identifiant du Bien</label><br/>
				<input type="text" name="idbien" placeholder="n° du Bien"/>
		  </div>
		  <div>
				<input type="submit" value="Supprimer" id="modifie"/>
		  </div>
		</form>
	</div>
	<?php
	if(isset($_POST["idbien"]))
	{
	$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
	$c=$con->prepare("delete from bien where idBien=?");
	$c->execute(array($_POST["idbien"]));
	}
	
	?>

</body>
</html>
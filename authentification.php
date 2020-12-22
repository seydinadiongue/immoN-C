<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Authentification</title>
 <link rel="stylesheet" href="style1.css" />
</head>
<body id="body8">
<form id="au" method="post" action="">
  <p>
		<p>
			<p>
			<label for="i1" id="l1">Nom D'utilisateur</label> <br/>
			</p>
			<input id="i1" name="login" type="text" size="40" maxlength="35" placeholder=" nom d'utilisateur"><br/>
		</p>
		<p>
			<p>
				<label for="i2" id="l2">Mot de Passe</label> <br/>
			</p>
			<input id="i2" name="pwd" type="password" size="40" maxlength="10" placeholder="  mot de passe"><br/>
		</p>
		   <input id="i3" name="save" type="submit" value="se connecter"> <br/>
		<br/>
		<p id="p1">
		     <a id="i4" href="inscrire.php" target="_blank">CRéER UN NOUVEAU COMPTE</a>
		</p>
  </p>
</form>
<?php

$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");

if(isset($_POST["login"]) && isset($_POST["pwd"]))
{
	$req1=$con->prepare("select etat from compte where login like ?");
	$req1->execute(array($_POST["login"]));
	
	
	$requete=$con->prepare('select login,mdp from client cl join compte c  where cl.idClient=c.login and login like ? and mdp like ? ');
	$requete->execute(array($_POST["login"],$_POST["pwd"]));
	
	$req=$con->prepare('select login,mdp from agent a join compte c  where a.idAgent=c.login and  login like ? and mdp like ? ');
	$req->execute(array($_POST["login"],$_POST["pwd"]));
	
	while($res=$requete->fetch())
	{
		$r=$req1->fetch();
		if($r["etat"]=="desactiver")
			header("location:authentification.php");
		else
			header("location:reserver.php");
	}
	
	while($res=$req->fetch())
	{
		$r=$req1->fetch();
		if($r["etat"]=="desactiver")
			header("location:authentification.php");
		else
			header("location:accueilagent.php");
	}
	
	if($_POST["login"]=="cheikh196" && $_POST["pwd"]=="azerty")
	header("location:admin.php");
}
$con=null;
?>
</body>
</html>
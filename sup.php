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

<?php
$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
if(isset($_POST["idBien"]))
	{
		$var=$_POST["idBien"];
		$a=$con->prepare("delete from reservation where idBien=?");
		$a->execute(array($var));
		
		$x=$con->prepare("delete from bien where idBien=?");
       $ndeye= $x->execute(array($var));
	if($ndeye)
	//{echo"<script>alert('Le bien est supprimé');</script>";}
		header("location:bien.php");
		//echo"<script>alert('Le bien est supprimé');</script>";
	}
	?>
	</body>
</html>
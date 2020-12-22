<?php
session_start();
$_SESSION['login']=null;
?>
<!doctype html>
<html>
<head>
	<meta charset ="utf-8"/>
	<link rel="styleSheet" href="styleconnexion.css"/>
	</head>
	<body>
	<section>
	<form method="POST" action= "connexion.php">
	<p><label>Login</label><input type="text" 
	placeholder="donnez votre login " required="*" name="logi" id='logi'/></br></br></br>
	<label>Password</label><input type="password" 
	placeholder="donnez votre mot de passe  "   required="*" 
	name="psw" id='psw'/></br></br></br>
	<input type="submit" name="conn" id='conn' value="Se connecter"/>
		</p></section>
		
		
		
		
		<?php
if(isset ($_POST['logi']) AND isset( $_POST['psw']))
{
$a= $_POST['logi']	;$b= $_POST['psw'];


$bd= new PDO("mysql:host=localhost;dbname=immo","root","");
if($bd){
if(($a=='admin1') and ($b=='admin2'))
{
	$_SESSION['login']="admin1";
	//var_dump($_SESSION['login']);
	header("Location:admin.php");
}



$q12a= "select * from client ";
$q112a=$bd->query($q12a);
while($ligne2a=$q112a->fetch()){
$idClient=$ligne2a['idClient'];



$q12= "select * from agent ";
$q112=$bd->query($q12);
while($ligne2=$q112->fetch()){
$idAgent=$ligne2['idAgent'];

$q1= "select * from compte ";
$q11=$bd->query($q1);
while($ligne=$q11->fetch()){
$mdp=$ligne['mdp'];
$login=$ligne['login'];
$etat=$ligne['etat'];

 if(($a==$login) and ($b==$mdp) and ($etat=="actif")
	 and ($a==$idClient))

	 { 
		$_SESSION['login']=$a;
		 header("Location:reserver.php");
	 }
   
   
   
  else if(($a==$login)  && ($a==$idAgent) &&
 ($b==$mdp) && ($etat=="actif"))
 {
	 $_SESSION['login']=$login;
	 header("Location:accueilagent.php");
 }

 

}

}}}}

?>





	</form>
	</body>
	</html>
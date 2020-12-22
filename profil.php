

<?php
session_start();

if($_SESSION['login']==NULL)
	header("Location:connexion.php");
?>



<!doctype html>
<html>
<head>
	<meta charset ="utf-8"/>
	<script src="jquery-3.4.1.min.js"></script>
	<link rel="styleSheet" href="styleins.css"/>
	<title>Modifier profil</title>
	</head>
	<body>
	
	<?php
	$agent=$_SESSION["login"];
	 
		 $bd= new PDO("mysql:host=localhost;dbname=immo","root","");
	if($bd)
		$f=$bd->query("select * from agent where idAgent='$agent '" );
	
	
	$ligne=$f->fetch();
	$p=$ligne['prenom'];
	$n=$ligne['nom'];
	$a=$ligne['adresse'];
	$t=$ligne['telephone'];
	
	if($f)
	{
		$f1=$bd->query("select * from compte where login='$agent '" );
	
	
	$ligne1=$f1->fetch();
	$u=$ligne1['mdp'];
	}
	
	
	?>
	<section>
	<form  id="form" method="POST" action= "">
	<p><label >Prenom</label><input required="*"  type="text" 
	placeholder="donner votre prenom " name="prenom" id='logi' value="<?php
	 echo $p ;?>"/></p>
	<p><label>Nom</label><input type="text" required="*"
	placeholder="donner votre nom " name="nom" id='nom' value="<?php echo $n;?>"/></p>
	<p><label>Adresse</label><input required="*"  type="text" 
	placeholder="donner votre adresse " name="adresse" id='adresse' value="<?php echo $a;?>"/></p>
	<p><label>Telephone</label><input  required="*"  type="text" 
	placeholder="donner votre telephone " name="telephone" 
	id='telephone'   value="<?php echo $t;?> "/></p>
	
	<p><label>Mdp</label><input required="*" type="password" 
	placeholder="choisir un mot de passe  " 
	name="mdp" id='mdp' value="<?php echo $u;?>"/></p>
	<p><label >Confirmer </label><input  required="*" type="password" 
	placeholder="confirmer votre mot de passe  " 
	name="mdp1" id='mdp1' value="<?php echo $u;?>"/></p><br>
	<input type="submit" name="conn" id='conn' 
	value="Modifier" style="margin-left:240px"/>
		</section>
	</form>
	
	<?php
	if( isset($_POST['mdp'])
	  and isset($_POST['mdp1']) and isset($_POST['prenom'])
  and isset($_POST['nom']) and isset($_POST['adresse']) 
  and isset($_POST['telephone']))
	 {
		 $prenom=$_POST['prenom']; $nom=$_POST['nom']; $adresse=$_POST['adresse'];
	 $telephone=$_POST['telephone'];
		 $mdp=$_POST['mdp'];
		 $mdp1=$_POST['mdp1'];
		 
		 if(($prenom!=null ) and  ($nom!=null ) and  ($adresse!=null )
			 and  ($telephone!=null )  and  ($mdp!=null )
		 and  ($mdp1!=null ) ){
			 if ($mdp==$mdp1){
		 $bd= new PDO("mysql:host=localhost;dbname=immo","root","");
	if($bd)
		$r=$bd->exec("update compte set mdp='$mdp1' where login='$agent'");
	//if($r) echo"<script> alert('Vous avez modifié votre mdp');</script>";
		$rr=$bd->exec("update agent set prenom='$prenom',nom='$nom',adresse='$adresse',telephone='$telephone' where idagent ='$agent'");
		
		
	if($rr) 
	echo"<script> alert('Profil modifié avec succes !!!');</script>";
	//header("Location:profil.php");
	
	 }}}//}
	 
	 //header("Location:profil.php");
 ?>
 
 <script>
/*var form=document.getElementById('form');
 form.addEventListener("submit",function()
 {
	 form.reset();
	 ,false);
 }*/
  </script>
  
  <script>
  var ips=document.getElementsByTagName('input');
  var form=document.getElementById('form');
		 var l=ips.length;
		 for( var i=0;i<l;i++)
		 {
		 ips[i].addEventListener('change',function()
		 {
	if((this.value <"0") || (this.value =="")|| (this.value ==0))
	{ 
this.style.border='2px solid red';
alert("Valeur saisie incorrecte !!!");
    this.focus();
   this.value="";
   
  
	}
	else
		this.style.border='1px solid green';
		
		 },false);
		 }
		 
		
</script>




	</body>
	</html>
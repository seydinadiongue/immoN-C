<!doctype html>
<html>
<head>
	<meta charset ="utf-8"/>
	<link rel="styleSheet" href="styleins.css"/>
	</head>
	<body>
	<section>
	<form method="POST" action= "inscription.php">
	<p><label >Prenom</label><input type="text" 
	placeholder="donner votre prenom "  required="*" name="prenom" id='logi'/></p>
	<p><label>Nom</label><input required="*" type="text" 
	placeholder="donner votre nom " name="nom" id='nom'/></p>
	<p><label>Adresse</label><input required="*" type="text" 
	placeholder="donner votre adresse " name="adresse" id='adresse'/></p>
	<p><label>Telephone</label>
	<input  required="*" type="text" pattern="^7([7806])[0-9]{7}" placeholder="il doit commencer obligatoirement par 70,77,76 ou 78" name="telephone" id='telephone'/>
	</p><span id="nb">NB:</span><span id="numero">le Numéro doit comptenir 9 chiffres</span><br/>
	<span id="nb">Exemple:</span><span id="numero" >777605941</span><br/>
	
	<p><label>username</label>
	<input required="*"  type="text" placeholder="choisir votre nom d'utilisateur " name="nu" id='nu'/></p>
	<p><label>Mdp</label><input required="*"  type="password" 
	placeholder="choisir un mot de passe  " 
	name="mdp" id='mdp'/></p>
	<p><label >Confirmer </label><input type="password" 
	placeholder="confirmer votre mot de passe  " 
	name="mdp1" id='mdp1' required="*"/></p><br>
	<input type="submit" name="conn" id='conn' 
	value="Valider"/>
		</section>
	</form>
	<?php
	if(isset($_POST['nu']) and  isset($_POST['mdp'])
	  and isset($_POST['mdp1']) and isset($_POST['prenom'])
  and isset($_POST['nom']) and isset($_POST['adresse']) 
  and isset($_POST['telephone']))
	 {
		 $prenom=$_POST['prenom']; $nom=$_POST['nom']; $adresse=$_POST['adresse'];
	 $telephone=$_POST['telephone'];
		 $nu=$_POST['nu'];$mdp=$_POST['mdp'];
		 $mdp1=$_POST['mdp1'];
		 
		 if(($prenom!=null ) and  ($nom!=null ) and  ($adresse!=null )
			 and  ($telephone!=null ) and  ($nu!=null ) and  ($mdp!=null )
		 and  ($mdp1!=null ) ){
			 if ($mdp==$mdp1){
		 $bd= new PDO("mysql:host=localhost;dbname=immo","root","");
	if($bd)
		$r=$bd->exec("insert into compte value ('$nu','$mdp','Non actif')");
	if($r){
		$rr=$bd->exec("insert into client value ('$nu','$prenom','$nom','$adresse','$telephone')");
		if($rr)
			echo"<script> alert('Inscription réussie !!!');</script>";
		
	} }}}
 ?>
	</body>
	 </html>
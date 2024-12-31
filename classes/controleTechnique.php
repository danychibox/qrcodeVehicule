<?php
if (isset($_POST['validerControle'])) {
	$resultat=$_POST['resultat'];
	$dateCont=$_POST['datecontrole'];
	$valide=$_POST['nom'];
	$codeVehicule=$_POST['codeVehicule'];
		$connexion=mysqli_connect("localhost","root","","surveillance");
	$requette="insert into controltechnique(Resultat,DateContr,Validite,IdVeheicule)values('$resultat','$dateCont','$valide','$codeVehicule')";
	$sql=mysqli_query($connexion,$requette);
	if ($sql) {
		echo "enregistrement reussi";
	}else{
		echo "echec d'enregistrement".mysqli_error($connexion);
	}
}
?>
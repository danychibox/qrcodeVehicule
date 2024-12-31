<?php
if (isset($_POST['validerProprietaire'])) {
	$nom=$_POST['nom'];
	$postnom=$_POST['postnom'];
	$addresse=$_POST['adresse'];
	$nomlieu=$_POST['nomlieu'];
	$dateNaiss=$_POST['dateNaiss'];
	$codeVehicule=$_POST['codeVehicule'];
	$connexion=mysqli_connect("localhost","root","","surveillance");
	$requette="insert into propriete(NomProp,PostNomProp,Adresse,LieuNaiss,DateNaiss,IdVeheicule) values('$nom','$postnom','$addresse','$nomlieu','$dateNaiss','$codeVehicule')";
	$sql=mysqli_query($connexion,$requette);
	if ($sql) {
		echo "enregistrement reussi";
	}else{
		echo "erreur".mysqli_error($connexion);
	}
}
?>
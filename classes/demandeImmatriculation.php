<?php
if (isset($_POST['validerDemande'])) {
	$datePermis=$_POST['datePermis'];
	$dateDemande=$_POST['dateDemande'];
	$motif=$_POST['motif'];
	$codeVehicule=$_POST['codeVehicule'];
	$connexion=mysqli_connect("localhost","root","","surveillance");
	$requette="insert into demandeimmatriculation(DatePremCircul,DateDem,Motif,IdVeheicule) values('$datePermis','$dateDemande','$motif','$codeVehicule')";
	$sql=mysqli_query($connexion,$requette);
	if ($sql) {
		echo "enregistrement reussi";
	}else{
		echo "echec d'enregistrement";
	}
}
 ?>
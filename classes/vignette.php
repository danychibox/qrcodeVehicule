<?php
if (isset($_POST['validerVignette'])) {
	$tcsr=$_POST['tcsr'];
	$atbt=$_POST['atbt'];
	$exercice=$_POST['exercice'];
	$lieu=$_POST['lieu'];
	$dateP=$_POST['datePaiement'];
	$frais=$_POST['fraisVignette'];
	$Vehicule=$_POST['codeVehicule'];
	$connexion=mysqli_connect("localhost","root","","surveillance");
	$requette="insert into vignette(TCSR,ATBT,exerciceFiscal,lieu,dateLivr,FraisVignette,IdVeheicule) values('$tcsr','$atbt','$exercice','$lieu','$dateP','$frais','$Vehicule')";
	$sql=mysqli_query($connexion,$requette);
	if ($sql) {
		echo "enregistrement reussi";
	}else{
		echo "erreur".mysqli_error($connexion);
	}
}
?>
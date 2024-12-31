<?php

if (isset($_POST['validerVehicule'])) {
	$marque=$_POST['marque'];
	$immTempo=$_POST['immTempo'];
	$numerosChassis=$_POST['numerosChassis'];
	$anneeFabric=$_POST['anneeFabric'];
	$poids=$_POST['poids'];
	$prix=$_POST['prix'];
	$dateImport=$_POST['dateImport'];
	$couleur=$_POST['couleur'];
	$typeVehicule=$_POST['typeVehicule'];
	$connexion=mysqli_connect("localhost","root","","surveillance");
	$requette="insert into vehicule(ImmatrTemp,Marque,NumChassis,AnneeFabric,Poids,PrixArticle,DateImport,CouleurVeh,TypeVeh) values('$immTempo','$marque','$numerosChassis','$anneeFabric','$poids','$prix','$dateImport','$couleur','$typeVehicule')";
	$sql=mysqli_query($connexion,$requette);
	if ($sql) {
		echo("<script>
		alert('enregistrement reussi');
		</script>");
	}else{
		echo "echec de connexion";
	}
}
?>
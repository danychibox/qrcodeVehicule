<?php
if (isset($_POST['validerImmat'])) {
	$codeVehicule=$_POST['resultat'];
	$immat=$_POST['numeroImm'];
	$connexion=mysqli_connect("localhost","root","","surveillance");
	$requette="insert into immatricule(idVehicule,designation) values('$codeVehicule','$immat')";
	$sql=mysqli_query($connexion,$requette);
	if ($sql) {
		echo "enregistrement reussi";
		$connexion=mysqli_connect("localhost","root","","surveillance");
		$req="select vehicule.ImmatrTemp,vehicule.DateImport as dateImmatriculationTempo, vehicule.NumChassis,vehicule.IdVeheicule,immatricule.designation,controltechnique.Resultat,vignette.exerciceFiscal, propriete.nomProp,propriete.PostNomProp from vehicule inner join immatricule on immatricule.idVehicule=vehicule.IdVeheicule inner join controltechnique on controltechnique.IdVeheicule=vehicule.IdVeheicule inner join vignette on vignette.IdVeheicule=vehicule.IdVeheicule inner join propriete on propriete.IdVeheicule=vehicule.IdVeheicule WHERE immatricule.designation='$immat'";
		$exec=mysqli_query($connexion,$req);
		if(!$exec){
			echo("erreur").mysqli_error($connexion);
			}
			else{
				$link='';
				$qrcode='';
		while($row=mysqli_fetch_array($exec)) {
			$info='immatriculation temporaire='.$row['ImmatrTemp'].'
			date immatriculation
			='.$row['dateImmatriculationTempo'].'
			controle technique='.$row['Resultat'].'
			annee de validité de vignete='.$row['exerciceFiscal'].'
			proprietaire='.$row['nomProp'].' '.$row['PostNomProp'];
			require_once '../phpqrcode/qrlib.php';
			$path='../images/';
			$link=$info;
			//$link='http://localhost/rodrigue memoire/afichage/afichageInfos.php?code='.$numerosChassis;
			$qrcode=$path.time().".png";

			QRcode::png($link,$qrcode,'H',4,4);
		}	
	}		
	}else{
		echo "erreur".mysqli_error($connexion);
	}
	}
 ?>
 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../design/menuDesign.css">
		<script type="text/javascript"src="impression.js"></script>
		<title>code</title>
	</head>

	<body>
		<div class="entete">
					<ul>
						<li ><a class="btnMenu" href="../index.html">accueil</a></li>	
						<li class="active"><a class="btnMenu" href="../classes/vehicule.php">vehicule</a></li>
					</ul>
		</div>
		<div class="container">
			<center>
			<?php 
			echo("le code de qr de votre vehicule ");
			echo "</br><img src='".$qrcode."'>";
			echo("</br>");
			echo($link);
			 ?>
			 <br>
			 <button class="btn btn-primary"onclick='window.print();'>
			 	imprimmer
			 </button>
			</center>
		</div>
	</body>
</html>
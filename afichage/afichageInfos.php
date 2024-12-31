<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../design/menuDesign.css">
		<script type="text/javascript"src="../classes/impression.js"></script>
		<title>code</title>
	</head>

	<body>
		<div class="entete">
					<ul>
					<li ><a class="btnMenu" href="../index.html">accueil</a></li>	
					</ul>
		</div>
		<div class="container">
			<div id="contenu">
			<center>
				<table class="table table-border table-sm">
					<thead>
						<th>numero chassis</th>
						<th>numero plaque</th>
						<th>controle technique</th>
						<th>validité vignette</th>
						<th>nom proprietaire</th>
						<th>postnom proprietaire</th>
					</thead>
					<tbody>
			<?php 
			if (isset($_POST['code'])) {
				$codeV=$_POST['xcode'];
				$connexion=mysqli_connect("localhost","root","","surveillance");
				$requete=mysqli_query($connexion,"select vehicule.ImmatrTemp,vehicule.DateImport as dateImmatriculationTempo, vehicule.NumChassis,vehicule.IdVeheicule,immatricule.designation,controltechnique.Resultat,vignette.exerciceFiscal, propriete.nomProp,propriete.PostNomProp from vehicule inner join immatricule on immatricule.idVehicule=vehicule.IdVeheicule inner join controltechnique on controltechnique.IdVeheicule=vehicule.IdVeheicule inner join vignette on vignette.IdVeheicule=vehicule.IdVeheicule inner join propriete on propriete.IdVeheicule=vehicule.IdVeheicule WHERE immatricule.designation='$codeV'");
				if ($requete){
					while ($row=mysqli_fetch_array($requete)) {
										echo "<tr><td>".$row['NumChassis']."</td><td>".$row['designation']."</td><td>".$row['Resultat']."<td>".$row['exerciceFiscal']."
										</td><td>".$row['nomProp']."</td><td>".$row['PostNomProp']."
										</td></tr>";
										 require_once '../phpqrcode/qrlib.php';
			$path='../images/';
			$info='immatriculation temporaire='.$row['ImmatrTemp'].'
			date immatriculation
			='.$row['dateImmatriculationTempo'].'
			controle technique='.$row['Resultat'].'
			annee de validité de vignete='.$row['exerciceFiscal'].'
			proprietaire='.$row['nomProp'].' '.$row['PostNomProp'];
			$link=$info;
			//$link='http://localhost/rodrigue memoire/afichage/afichageInfos.php?code='.$numerosChassis;
			$qrcode=$path.time().".png";
			QRcode::png($link,$qrcode,'H',4,4);
									}
						}
					else {
						echo "vehicule non en ordre";
					}
				}
			 ?>
			 </tbody>
			 </table>
			 <?php
			
			 ?>
			<?php 
			echo("<h4>le code qr de votre vehicule </h4>");
			echo "</br><img src='".$qrcode."'>";
			echo("</br>");
			//echo($link);
			 ?>
			 <br>
			 <button class="btn btn-primary"onclick='window.print();'>
			 	imprimer
			 </button>
			</center>
			</div>
		</div>
	</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../design/menuDesign.css">
	<title>vignette</title>
</head>
<body>
<div class="entete">
		<ul>
			<li ><a class="btnMenu" href="../index.html">accueil</a></li>
			<li><a class="btnMenu" href="vehicule.php">vehicule</a></li>
			<li class="active"><a class="btnMenu" href="vignette.html">vignette</a></li>
			<li><a class="btnMenu" href="proprietaire.php" >proprietaire</a></li>
			<li><a class="btnMenu" href="controleTechnique.php">controle</a></li>
			<li><a class="btnMenu" href="immatriculation.php">immatriculation</a></li>
			<li><a class="btnMenu" href="demandeImmatriculation.php"> demande matricule</a></li>
		</ul>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<form name="validerVignette" method="POST" action="../classes/vignette.php">
				<div class="mb-3">
					<label for="" class="form-label"><h6>TCSR :</h6></label>
					<input type="text" name="tcsr" placeholder="TCSR" class="form-control">
				</div>
				<div class="mb-3">
					<label for="" class="form-label"><h6>ATBT :</h6></label>
					<input type="text" name="atbt" placeholder="ATBT" class="form-control">
				</div>
				<div class="mb-3">
				<label for="" class="form-label"><h6>EXERCICE FISCAL:</h6></label>
				<input type="text" name="exercice" placeholder="exercice fiscal" class="form-control">
				</div>
				<div class="mb-3">
				<label for="" class="form-label"><h6>LIEU:</h6></label>
				<input type="text" name="lieu" placeholder="lieu de paiement" class="form-control">
				</div>
				<div class="mb-3">
				<label for="" class="form-label"><h6>DATE DE PAIEMENT:</h6></label>
				<input type="date" name="datePaiement" class="form-control">
				</div>
				<div class="mb-3">
				<label for="" class="form-label"><h6>FRAIS DE LA VIGNETTE:</h6></label>
				<input type="text" name="fraisVignette" placeholder="FRAIS DE LA VIGNETTE" class="form-control">
				</div>
				<div class="mb-3">
				<label for="" class="form-label"><h6>VEHICULE:</h6></label>
				<select class="form-control" name="codeVehicule">
					<?php
					$connexion=mysqli_connect("localhost","root","","surveillance");
					$requete="select * from vehicule";
					$executer=mysqli_query($connexion,$requete);
					while($row=mysqli_fetch_array($executer)){
					echo"<option value='".$row["IdVeheicule"]."'>".$row["NumChassis"]."</option>";
				}

					?>
				</select>
				</div>
				<div class="mb-3">
						<button type="submit" name="validerVignette" class="btn btn-primary">enregistrer</button> 
				</div>
				</form>
		</div>
		<div class="col-sm-6">
			<table class="table table-border table-sm">
				<thead>
					<th>TCSR</th>
					<th>ATBT</th>
					<th>EXERCICE</th>
					<th>LIEU</th>
					<th> DATE</th>
					<th>FRAIS</th>
					<th>VEHICULE</th>
				</thead>
				<tbody>
					<?php 
				$connexion=mysqli_connect("localhost","root","","surveillance");
				$req="select * from  vignette";
				$exec=mysqli_query($connexion,$req);
				while ($row=mysqli_fetch_array($exec)) {
					echo "<tr><td>".$row['TCSR']."</td><td>".$row['ATBT']."</td><td>".$row['exerciceFiscal']."<td>".$row['lieu']."
					</td><td>".$row['dateLivr']."</td><td>".$row['FraisVignette']."<td>".$row['IdVeheicule']."
					</td></tr>";
				}
				?>
				</tbody>
			</table>
			
		</div>
	</div>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../design/menuDesign.css">
	<title>proprietaire</title>
</head>
<body>
<div class="entete">
		<ul>
			<li ><a class="btnMenu" href="../index.html">accueil</a></li>
			<li><a class="btnMenu" href="vehicule.php">vehicule</a></li>
			<li><a class="btnMenu" href="vignette.php">vignette</a></li>
			<li class="active"><a class="btnMenu" href="proprietaire.php" >proprietaire</a></li>
			<li><a class="btnMenu" href="controleTechnique.php">controle</a></li>
			<li><a class="btnMenu" href="immatriculation.php">immatriculation</a></li>
			<li><a class="btnMenu" href="demandeImmatriculation.php"> demande matricule</a></li>
		</ul>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<form name="validerProprietaire" method="POST" action="../classes/proprietaire.php">
				<div class="mb-3">
					<label for="" class="form-label"><h6>NOM :</h6></label>
					<input type="text" name="nom" placeholder="nom " class="form-control">
				</div>
				<div class="mb-3">
					<label for="" class="form-label"><h6>POSTNOM :</h6></label>
					<input type="text" name="postnom" placeholder="postnom" class="form-control">
				</div>
				<div class="mb-3">
				<label for="" class="form-label"><h6>ADRESSE:</h6></label>
				<input type="text" name="adresse" placeholder="adresse " class="form-control">
				</div>
				<div class="mb-3">
					<label for="" class="form-label"><h6>lieu de naissance :</h6></label>
					<input type="text" name="nomlieu" placeholder="année de fabrication" class="form-control">
				</div>
				<div class="mb-3">
					<label for="" class="form-label"><h6>date de naissance :</h6></label>
					<input type="date" name="dateNaiss" class="form-control">
				</div>
				<div class="mb-3">
					<label for="" class="form-label"><h6>VEHICULE :</h6></label>
					<select class="form-control" name="codeVehicule">
					<?php
					$connexion=mysqli_connect("localhost","root","","surveillance");
					$requete="select * from  vehicule";
					$executer=mysqli_query($connexion,$requete);
					while($row=mysqli_fetch_array($executer)){
					echo"<option value='".$row["IdVeheicule"]."'>".$row["NumChassis"]."</option>";
				}

					?>
				</select>
				</div>
				<div class="mb-3">
						<button type="submit" name="validerProprietaire" class="btn btn-primary">enregistrer</button> 
				</div>
				</form>
		</div>
		<div class="col-sm-8">
			<table class="table table-border table-sm">
				<thead>
					<th><h6>NOM</h6></th>
					<th><h6>POSTNOM</h6></th>
					<th><h6>ADRESSE</h6></th>
					<th><H6>LIEU DE NAISSANCE</H6></th>
					<th><h6>DATE DE NAISSANCE</h6></th>
					<th><H6>VEHICULE</H6></th>
				</thead>
				<tbody>
					<?php 
				$connexion=mysqli_connect("localhost","root","","surveillance");
				$req="select * from propriete ";
				$exec=mysqli_query($connexion,$req);
				while ($row=mysqli_fetch_array($exec)) {
					echo "<tr><td>".$row['NomProp']."</td><td>".$row['PostNomProp']."</td><td>".$row['Adresse']."<td>".$row['LieuNaiss']."
					</td><td>".$row['DateNaiss']."<td>".$row['IdVeheicule']."
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
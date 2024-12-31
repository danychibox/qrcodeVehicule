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
			<li><a class="btnMenu" href="vignette.php">vignette</a></li>
			<li><a class="btnMenu" href="proprietaire.php" >proprietaire</a></li>
			<li><a class="btnMenu" href="controleTechnique.php">controle</a></li>
			<li><a class="btnMenu" href="immatriculation.php">immatriculation</a></li>
			<li class="active"><a class="btnMenu" href="demandeImmatriculation.php"> demande matricule</a></li>
		</ul>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<form name="validerDemande" method="POST" action="../classes/demandeImmatriculation.php" >
				<div class="mb-3">
					<label for="" class="form-label"><h6>date permis de circuler :</h6></label>
					<input type="date" name="datePermis" class="form-control">
				</div>
				<div class="mb-3">
					<label for="" class="form-label"><h6>date de la demande:</h6></label>
					<input type="date" name="dateDemande" class="form-control">
				</div>
				<div class="mb-3">
				<label for="" class="form-label"><h6>MOTIF:</h6></label>
				<input type="text" name="motif" placeholder="motif de la demande" class="form-control">
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
						<button type="submit" name="validerDemande" class="btn btn-primary">enregistrer</button> 
				</div>
				</form>
		</div>
		<div class="col-sm-6">
			<table class="table table-border table-sm">
				<thead>
					<th>DATE PERMIS</th>
					<th>DATE DEMANDE</th>
					<th>MOTIF</th>
					<th>VEHICULE</th>
				</thead>
				<tbody>
					<?php 
				$connexion=mysqli_connect("localhost","root","","surveillance");
				$req="select vehicule.NumChassis, vehicule.IdVeheicule, demandeimmatriculation.DatePremCircul,demandeimmatriculation.DateDem,demandeimmatriculation.motif from vehicule inner join demandeimmatriculation on demandeimmatriculation.IdVeheicule=vehicule.IdVeheicule ";
				$exec=mysqli_query($connexion,$req);
				while ($row=mysqli_fetch_array($exec)) {
					echo "<tr><td>".$row['DatePremCircul']."</td><td>".$row['DateDem']."</td><td>".$row['motif']."<td>".$row['IdVeheicule']."
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
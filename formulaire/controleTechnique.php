<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../design/menuDesign.css">
	<title>controle technique</title>
</head>
<body>
<div class="entete">
		<ul>
			<li ><a class="btnMenu" href="../index.html">accueil</a></li>
			<li><a class="btnMenu" href="vehicule.php">vehicule</a></li>
			<li><a class="btnMenu" href="vignette.php">vignette</a></li>
			<li><a class="btnMenu" href="proprietaire.php" >proprietaire</a></li>
			<li class="active"><a class="btnMenu" href="controleTechnique.php">controle</a></li>
			<li><a class="btnMenu" href="immatriculation.php">immatriculation</a></li>
			<li><a class="btnMenu" href="demandeImmatriculation.php"> demande matricule</a></li>
		</ul>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<form method="POST" action="../classes/controleTechnique.php" >
				<div class="mb-3">
					<label for="" class="form-label"><h6>RESULTAT :</h6></label>
					<input type="text" name="resultat" placeholder="resultat du controle" class="form-control">
				</div>
				<div class="mb-3">
					<label for="" class="form-label"><h6>DATE DU CONTROLE :</h6></label>
					<input type="date" name="datecontrole" class="form-control">
				</div>
				<div class="mb-3">
				<label for="" class="form-label"><h6>VALIDITE:</h6></label>
				<input type="text" name="nom" placeholder="Validté du controle" class="form-control">
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
						<button type="submit" name="validerControle" class="btn btn-primary">enregistrer</button> 
				</div>
				</form>
		</div>
		<div class="col-sm-6">
			<table class="table table-border table-sm">
				<thead>
					<th>VEHICULE</th>
					<th>DATE DU CONTROLE</th>
					<th>VALIDITE</th>
					<th>RESULTAT</th>
				</thead>
				<tbody>
				<?php 
				$connexion=mysqli_connect("localhost","root","","surveillance");
				$req="select * from controltechnique ";
				$exec=mysqli_query($connexion,$req);
				while ($row=mysqli_fetch_array($exec)) {
					echo "<tr><td>".$row['IdVeheicule']."
					</td><td>".$row['DateContr']."</td><td>".$row['Validite']."</td><td>".$row['Resultat']."</td></tr>";
				}
				?>
				</tbody>
			</table>
			
		</div>
	</div>
</div>
</body>
</html>
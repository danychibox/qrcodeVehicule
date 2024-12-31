<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../design/menuDesign.css">
		<title>vehicule</title>
	</head>

	<body>
		<div class="entete">
					<ul>
						<li ><a class="btnMenu" href="../index.html">accueil</a></li>
						<li class="active"><a class="btnMenu" href="vehicule.php">vehicule</a></li>
						<li><a class="btnMenu" href="vignette.php">vignette</a></li>
						<li><a class="btnMenu" href="proprietaire.php" >proprietaire</a></li>
						<li><a class="btnMenu" href="controleTechnique.php">controle</a></li>
						<li><a class="btnMenu" href="immatriculation.php">immatriculation</a></li>
						<li><a class="btnMenu" href="demandeImmatriculation.php"> demande matricule</a></li>
					</ul>

		</div>

		<div class="container">
				<div class="row">
						<div class="col-sm-4">
								<form  name="validerVehicule" method="POST" action="../classes/vehicule.php">
									<div class="mb-3">
										<label for="" class="form-label"><h6>MARQUE DU VEHICULE :</h6></label>
										<input type="text" name="marque" placeholder="marque du vehicule" class="form-control">
									</div>
									<div class="mb-3">
											<label for="" class="form-label"><h6>IMMATRICULATION TEMPO :</h6></label>
											<input type="text" name="immTempo" placeholder="immatriculation temporaire" class="form-control">
										</div>
										<div class="mb-3">
											<label for="" class="form-label"><h6>NUMEROS CHASSIS:</h6></label>
											<input type="text" name="numerosChassis" placeholder="numeros du chassis" class="form-control">
										</div>
											<div class="mb-3">
												<label for="" class="form-label"><h6>ANNEE DE FABRIC :</h6></label>
												<input type="text" name="anneeFabric" placeholder="année de fabrication" class="form-control">
											</div>
											<div class="mb-3">
												<label for="" class="form-label"><h6>POIDS :</h6></label>
												<input type="text" name="poids" placeholder="poids du vehicule" class="form-control">
											</div>
										<div class="mb-3">
											<label for="" class="form-label"><h6>PRIX :</h6></label>
											<input type="text" name="prix" placeholder="marque du vehicule" class="form-control">
										</div>
										<div class="mb-3">
											<label for="" class="form-label"><h6>DATE IMPORTATION :</h6></label>
											<input type="date" name="dateImport" class="form-control">
										</div>
										<div class="mb-3">
											<label for="" class="form-label"><h6>COULEUR DU VEHICULE :</h6></label>
											<input type="text" name="couleur" placeholder="couleur du vehicule" class="form-control">
										</div>
										<div class="mb-3">
											<label for="" class="form-label"><h6>TYPE DU VEHICULE :</h6></label>
											<input type="text" name="typeVehicule" placeholder="type du vehicule" class="form-control">
										</div>
										<div class="mb-3">
												<button type="submit" name="validerVehicule" class="btn btn-primary">enregistrer</button>
										</div>
								</form>
							</div>
						
						<div class="col-sm-8">
							<table class="table table-border table-sm">
								<thead>
									<th>marque</th>
									<th>tempo</th>
									<th>chassis</th>
									<th>année fabication</th>
									<th>poids</th>
									<th>prix</th>
									<th>couleur</th>
									<th>type</th>
									<th>date import</th>

								</thead>
								<tbody>
										<?php 
									$connexion=mysqli_connect("localhost","root","","surveillance");
									$req="select* from vehicule ";
									$exec=mysqli_query($connexion,$req);
									while ($row=mysqli_fetch_array($exec)) {
										echo "<tr><td>".$row['Marque']."</td><td>".$row['ImmatrTemp']."</td><td>".$row['NumChassis']."<td>".$row['AnneeFabric']."
										</td><td>".$row['Poids']."</td><td>".$row['PrixArticle']."<td>".$row['CouleurVeh']."
										</td><td>".$row['TypeVeh']."<td>".$row['DateImport']."
										</td></tr>";
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
	</body>

</html>
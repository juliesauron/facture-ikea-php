<?php 

$client = array(
	"nom" => "Pierre Vélon",
	"adresse" => "1 rue du Ciel Etoilé",
	"ville" => "Pôle Nord");

$vendeur = array(
	"nom" => "Meuble IKEA France SAS",
	"rue" => "425 rue Henri Barbusse",
	"ville" => "78375 Plaisir",
	"siren" => "351745724",
	"tva" => "FR83351745724");

$prestations = array(
array(
	"reference" => "001.692.54",
	"produit" => "KALLAX étagère",
	"description" => "77x77cm",
	"prix" => 39.99,
	"quantite" => mt_rand(1,9)),
array(
	"reference" => "202.196.36",
	"produit" => "BILLY bibliothèque",
	"description" => "80x28x202cm",
	"prix" => 79.95,
	"quantite" => mt_rand(1,9)),
array(
	"reference" => "204.564.67",
	"produit" => "FINNBY bibliothèque",
	"description" => "60x180cm",
	"prix" => 39.99,
	"quantite" => mt_rand(1,9)),
array(
	"reference" => "045.567.34",
	"produit" => "EKET rangement",
	"description" => "70x35x70cm",
	"prix" => 50,
	"quantite" => mt_rand(1,9)),
array(
	"reference" => "143.603.49",
	"produit" => "MALM commode 3 tiroirs",
	"description" => "80x78cm",
	"prix" => 89.99,
	"quantite" => mt_rand(1,9))
);


?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Facture n°FRINV2000456730</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="styles/styles.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<main class="print">
			<header>
				<div class="bleu"><img src="images/logo.jpg" alt="logo d'ikéa" /></div>
				<div class="jaune">
					<h1>FACTURE</h1>
					<p>N° de facture : FRINV2000456730 </br>
					Facture émise le <?php echo(date("d/m/y")); ?></p>
					<p><span class="nom"><?php echo($client["nom"]); ?></span></br>
					<?php echo($client["adresse"]."</br>".$client["ville"]) ?></p>
					<p>Adresse de facturation : </br>
					<?php echo($client["adresse"]."</br>".$client["ville"]); ?></p>
				</div>
				<div class="vendeur">
					<p><?php echo($vendeur["nom"]."</br>".$vendeur["rue"]."</br>".$vendeur["ville"]."</br>Siren : ".$vendeur["siren"]."</br> Numéro TVA : ".$vendeur["tva"]); ?></p>
				</div>
			</header>
			<section>
				<h2>COMMANDE n° 75932058, émise le <?php echo(date("d/m/y")); ?> et livrée le <?php echo(date("d/m/y")); ?></h2>
				<table>
					<thead>
						<tr>
							<th>REFERENCE</br><span class="small">du produit</span></th>
							<th class="left">PRODUIT</th>
							<th class="left">PRIX</br><span class="small">unitaire</span></th>
							<th>QUANTITE</th>
							<th class="right">PRIX</br><span class="small">total (HT)</span></th>
							<th class="right">TVA</br><span class="small">(20%)</span></th>
							<th class="right">PRIX</br><span class="small">total (TTC)</span></th>
						</tr>
					</thead>
					<tbody>
						<?php 

						$somme_ht = 0 ;
						$somme_tva = 0 ;
						$somme_ttc = 0 ;
						$prix_ht = 0 ;
						$prix_tva = 0 ;
						$prix_ttc = 0 ;

						for($i=0 ; $i < count($prestations) ; $i++){ 
							
						?>
						<tr>
							<td class="center"><?php echo($prestations[$i]["reference"]); ?></td>
							<td><?php echo($prestations[$i]["produit"]); ?></br>
								<span class="small"><?php echo($prestations[$i]["description"]); ?></span></td>
							<td><?php echo($prestations[$i]["prix"]); ?> €</td>
							<td class="center"><?php echo($prestations[$i]["quantite"]); ?></td>
							<td class="right"><?php $prix_ht = $prestations[$i]["quantite"] * $prestations[$i]["prix"]; echo($prix_ht); ?> €</td>
							<td class="right"><?php $prix_tva = ($prestations[$i]["quantite"]*$prestations[$i]["prix"])*20/100; echo($prix_tva); ?> €</td>
							<td class="right"><?php $prix_ttc = ($prestations[$i]["quantite"]*$prestations[$i]["prix"])*1.20; echo($prix_ttc); ?> €</td>
						</tr>
						<?php

						$somme_ht += $prix_ht;
						$somme_tva += $prix_tva;
						$somme_ttc += $prix_ttc;

						}
					
						?>
					</tbody>
				</table>
				<p class="droite"> TOTAL HT : <?php echo($somme_ht); ?> €</br>
					TOTAL TVA : <?php echo($somme_tva); ?> €</p>
				<span class="ttc">TOTAL TTC : <?php echo($somme_ttc); ?> €</span>
				<p class="paiement">Date de paiement : <?php echo(date("d/m/y")); ?></p>
			</section>
			<footer>
				<p class="center small" >Taux de pénalités exigibles en cas de non paiement à la date requise : 20%</br>
				Montant de l’indemnité forfaitaire en cas de retard de paiement : 150€</br>
				Tous les produits vendus chez IKEA sont garantis 2 ans -- ECO-participation DEE</p>
			</footer>
		</main>
	</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Titre de la page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-dark-grey.css">
</head>
<body>
	<header class="w3-theme w3-padding">
		<h1>Bienvenue chez CERI's Guitars</h1>
	</header>

	<nav class="w3-sidebar">
		<ul>
			<li><a href="?page=produits">Liste des produits</a></li>
			<li><a href="?page=modifprod&id=1">Modifier produit 1</a></li>
			<li><a href="?page=modifprod&id=2">Modifier produit 2</a></li>
			<!-- Ajouter des liens pour chaque produit à modifier -->
		</ul>
	</nav>

	<main style="margin-left:25%">
		<?php
			if (isset($_GET['page'])) {
				if ($_GET['page'] == 'produits') {
					// Afficher la liste des produits
					echo "<h1>Liste des produits</h1>";
					// Code pour afficher la liste des produits
				} elseif ($_GET['page'] == 'modifprod' && isset($_GET['id'])) {
					// Afficher le formulaire de modification du produit spécifié
					echo "<h1>Modifier le produit ".$_GET['id']."</h1>";
					// Code pour afficher le formulaire de modification du produit spécifié
				} else {
					echo "<h1>Page non trouvée</h1>";
				}
			} else {
				echo "<h1>Bienvenue sur notre site</h1>";
			}
		?>
	</main>

	<footer>
		<!-- Footer ici -->
	</footer>
</body>
</html>

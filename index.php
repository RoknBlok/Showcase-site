<!DOCTYPE html>
<html>
<head>
	<title>Titre de la page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-dark-grey.css">
	<style>
		#header-container {
			display: flex;
			align-items: center;
		}
		#header-container h1, #header-container button {
			display: inline-block;
			margin: 0;
		}
	</style>
</head>
<body>
	<header id="header-container" class="w3-theme w3-padding">
		<button id="open-button" class="w3-button w3-theme w3-xlarge">☰</button>
		<button id="close-button" class="w3-button w3-theme w3-xlarge" style="display: none">×</button>
		<h1>Bienvenue chez CERI's Guitars</h1>
	</header>

	<nav class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
		<a href="?page=produits" class="w3-bar-item w3-button">Liste des produits</a>
		<a href="?page=modifprod&id=1" class="w3-bar-item w3-button">Modifier produit 1</a>
		<a href="?page=modifprod&id=2" class="w3-bar-item w3-button">Modifier produit 2</a>
	</nav>

	<main class="w3-margin">
		<?php
			if (isset($_GET['page'])) {
				if ($_GET['page'] == 'produits') {
					// Afficher la liste des produits
					echo "<h1>Liste des produits</h1>";
					include("displayProduits.php");
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

	<script>
		function w3_open() {
			document.getElementById("mySidebar").style.display = "block";
			document.getElementById("open-button").style.display = "none";
			document.getElementById("close-button").style.display = "block";
		}

		function w3_close() {
			document.getElementById("mySidebar").style.display = "none";
			document.getElementById("open-button").style.display = "block";
			document.getElementById("close-button").style.display = "none";
		}

		document.addEventListener('click', function(event) {
		// Vérifier si l'élément cliqué est dans la sidebar ou le bouton qui ouvre la sidebar
		var sidebar = document.getElementById('mySidebar');
		var button = document.getElementById('open-button');
		if (sidebar.contains(event.target) || button.contains(event.target)) {
			w3_open();
			return;
		} else {
			// Si l'élément n'est pas dans la sidebar ou le bouton, fermer la sidebar
			w3_close();
		}
	});
	</script>
</body>
</html>

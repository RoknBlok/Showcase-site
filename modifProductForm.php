<?php
// Ouvrir le fichier texte contenant les informations des produits
$file = fopen("products.txt", "r");
//rcuprer les informations d'une lingue pou un id donné
while ($line = fgets($file)) {
  // Découper la ligne en champs séparés par des '|'
  $fields = explode("|", $line);
  // Vérifier que la ligne contient tous les champs requis
  if (count($fields) == 5) {
    // Récupérer les informations des champs
    $id = $fields[0];
    $nom = $fields[1];
    $categorie = $fields[2];
    $prix = $fields[3];
    $image = $fields[4];
    // Afficher une carte W3CSS pour le produit
    echo '<div class="w3-card-2 w3-third w3-padding">
            <img src="' . $image . '" style="width:100%">
            <div class="w3-container">
              <h4><b>' . $nom . '</b></h4>
              <p>Catégorie: ' . $categorie . '</p>
              <p>Prix: ' . $prix . '</p>
              <a class="w3-button w3-blue" href=?page=modifprod&id='.$id.'>Modifier</a>
              <button class="w3-button w3-red">Supprimer</button>
            </div>
          </div>';
  }
}
?>
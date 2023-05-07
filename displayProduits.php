<?php
// Ouvrir le fichier texte contenant les informations des produits
$file = fopen("products.txt", "r");

// Parcourir chaque ligne du fichier et afficher une carte W3CSS pour chaque produit
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
    echo '<div class="w3-card w3-third">
            <img src="' . $image . '" style="width:100%">
            <div class="w3-container">
              <h4><b>' . $nom . '</b></h4>
              <p>Catégorie: ' . $categorie . '</p>
              <p>Prix: ' . $prix . '</p>
            </div>
          </div>';
  }
}

// Fermer le fichier
fclose($file);

function afficher_produits_filtre($categories) {
  $file = fopen('produits.txt', 'r');

  while($line = fgets($file)) {
    $product_info = explode('|', $line);
    $categorie = $product_info[2];


    if(in_array($categorie, $categories)) {
      echo '<div class="w3-card w3-third">';
      echo '<img src="' . $product_info[4] . '" style="width:100%">';
      echo '<div class="w3-container">';
      echo '<h4>' . $product_info[1] . '</h4>';
      echo '<p>Catégorie : ' . $categorie . '</p>';
      echo '<p>Prix : ' . $product_info[3] . '€</p>';
      echo '</div></div>';
    }
  }

  fclose($file);
}
?>

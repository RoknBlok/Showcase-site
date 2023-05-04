<?php
// Vérification que toutes les informations ont été soumises
if(isset($_POST['nom']) && isset($_POST['categorie']) && isset($_POST['prix']) && isset($_POST['image'])) {
  // Récupération des informations soumises
  $nom = $_POST['nom'];
  $categorie = $_POST['categorie'];
  $prix = $_POST['prix'];
  $image = $_POST['image'];

  // Ouverture du fichier texte en mode "append" pour ajouter le nouveau produit à la fin
  $file = fopen('produits.txt', 'a');

  // Création de la ligne contenant les informations du nouveau produit
  $new_product = uniqid() . '|' . $nom . '|' . $categorie . '|' . $prix . '|' . $image . "\n";

  // Écriture de la nouvelle ligne dans le fichier texte
  fwrite($file, $new_product);

  // Fermeture du fichier texte
  fclose($file);

  // Redirection vers la page d'accueil avec un message de succès
  header('Location: index.php?success=1');
  exit;
}
else {
  // Redirection vers la page d'accueil avec un message d'erreur
  header('Location: index.php?error=1');
  exit;
}
?>
<?php
// Vérification que toutes les informations ont été soumises
if(isset($_POST['nom']) && isset($_POST['category']) && isset($_POST['prix'])) {
  // Récupération des informations soumises
  $nom = $_POST['nom'];
  $categorie = $_POST['category'];
  $prix = $_POST['prix'];
  
  // Vérification de l'image
  $image = '';
  if(isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
    $img_size = getimagesize($_FILES['image']['tmp_name']);
    if($img_size[0] == $img_size[1]) {
      $img_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
      $img_name = $nom . '.' . $img_extension;
      $img_path = 'images/' . $img_name;
      move_uploaded_file($_FILES['image']['tmp_name'], $img_path);
      $image = $img_path;
    }
    else {
      // Redirection vers la page d'accueil avec un message d'erreur si l'image n'a pas des dimensions carrées
      header('Location: index.php?error=2');
      exit;
    }
  }
  elseif(isset($_POST['image_url']) && !empty(trim($_POST['image_url']))) {
    $image_url = trim($_POST['image_url']);
    $img_extension = strtolower(pathinfo($image_url, PATHINFO_EXTENSION));
    $img_name = $nom . '.' . $img_extension;
    $img_path = 'images/' . $img_name;
    file_put_contents($img_path, file_get_contents($image_url));
    $image = $img_path;
  }

  // Ouverture du fichier texte en mode "append" pour ajouter le nouveau produit à la fin
  $file = fopen('products.txt', 'a');

  // Création de la ligne contenant les informations du nouveau produit
  $new_product = uniqid() . '1|' . $nom . '|' . $categorie . '|' . $prix . '|' . $image . "\n";

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

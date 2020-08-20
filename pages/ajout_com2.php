<?php
require '../includes/header.php';
if (isset($_GET['id']) && isset($_GET['produits'])) {
  $id_client = $_GET['id'];
  $produits = explode(",", $_GET['produits']);
  $suite_requette = "";
  // foreach ($produits as $produit) {
  // }
  $suite_requette .= implode(" OR REFERENCE = ", $produits);
  $requette = 'SELECT * FROM produit WHERE REFERENCE = ' . $suite_requette;
  $result = $db->prepare($requette);
  $result->execute();
  $produits = $result->fetchAll(PDO::FETCH_OBJ);
  $somme_total = 0;

  foreach ($produits as $produit) {
    $somme_total += $produit->PRIX;
  }

  $requet = "INSERT INTO commande (NUMCOM, NUM_CLIENT, DATECOM, TOTALE) VALUES (NULL, ?, CURRENT_DATE(), ?);";
  $result = $db->prepare($requet);
  $result->execute([$id_client, $somme_total]);

  header("Location: listes_com.php");
}

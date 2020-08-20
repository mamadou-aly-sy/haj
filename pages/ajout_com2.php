<?php
require '../includes/header.php';
if(isset($_GET['id'])&&isset($_GET['produits']))
{
  $id_client=$_GET['id'];
  $produits= explode(",",$_GET['produits']);
  $suite_requette="";
// foreach ($produits as $produit) {
// }
  $suite_requette.=implode(" OR REFERENCE = ",$produits);
  $requette='SELECT * FROM produit WHERE REFERENCE = '.$suite_requette;
  $result=$db->prepare($requette);
  $result->execute();
  $produits=$result->fetchAll(PDO::FETCH_OBJ);
  /*echo "<pre>"; 
  print_r($produit);
  echo "</pre>";
  die();*/
}
?>
<link rel="stylesheet" href="../css/select.css">
<div class="mt-4 text-center">
<h1 class="mt-4">Gestion Des Commandes</h1>
</div>
<div class="container d-flex justify-content-center mt-4">
  <div class="card mb-4 mt-3" style="width:30rem;">
    <div class="card-header">
    <h3 class="card-title text-center">Nouvelle Commande</h3>
      <div class="card-body">
        <form  action="" method="post">
            <div class="row mb-2 mt-2">
            <?php foreach ($produits as $prod):?>
            <div>
            <label for=""><?=$prod->LIBELLE?></label>
            <input type="number" name="" id="">
            </div>
            <?php endforeach;?>
            </div>
        </form>
      </div>
  </div>
</div>
<script src="../js/select_multi.js"></script>
<?php require '../includes/footer.php'?>
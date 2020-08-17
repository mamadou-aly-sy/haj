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
  $produit=$result->fetchAll(PDO::FETCH_OBJ);
  echo "<pre>"; 
  print_r($produit);
  echo "</pre>";
  die();
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

              <label for="">Id CLient</label>
                <select name="idclient" id="" class="form-control">
                <?php foreach ($client->fetchAll(PDO::FETCH_OBJ) as $client): ?>
                <option value="<?=$client->NUM_CLIENT?>"><?=$client->NOMCLIENT?></option>
                <?php endforeach?>
                </select>
                <label for="">Produit</label>
              <select name="produits[]" multiple class="form-control">
              <?php foreach ($produit->fetchAll(PDO::FETCH_OBJ) as $produit): ?>
                <option value="<?=$produit->REFERENCE?>"><?=$produit->LIBELLE?></option>
                <?php endforeach?>
              </select>
                <!-- dribbble -->
              <div class="col text-center mt-4">
              <input type="submit" name="submit" class="btn btn-primary" value="Soumettre">
            </div>
        </form>
      </div>
  </div>
</div>
<script src="../js/select_multi.js"></script>
<?php require '../includes/footer.php'?>
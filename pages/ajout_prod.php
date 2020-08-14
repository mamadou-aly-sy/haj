<?php

require '../database/db.php';
// select fournnisseur
$four = 'SELECT IDFOURNISSEUR,NOM FROM fournisseur';
$fourni = $db->prepare($four);
$fourni->execute();
// select categorie
$cat = 'SELECT CODECAT,NOMCAT FROM categorie';
$cate = $db->prepare($cat);
$cate->execute();

// ajout produit
if (!empty($_POST)) {

    $message = '';
    if (
        empty($_POST['libelle']) || empty($_POST['prix']) || empty($_POST['codecat']) || empty($_POST['idfournisseur'])
    ) {
        $message = 'Veuiller Remplire les champs';
    } else {
        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $codecat = $_POST['codecat'];
        $idfournisseur = $_POST['idfournisseur'];
        $requette = 'INSERT INTO produit (LIBELLE,PRIX,CODECAT,IDFOURNISSEUR)
      VALUE(:libelle,:prix,:codecat,:idfournisseur)';
        $statement = $db->prepare($requette);
        if ($statement->execute([
            ':libelle' => $libelle, ':prix' => $prix, ':codecat' => $codecat, ':idfournisseur' => $idfournisseur,
        ])) {
            header('location:listes_prod.php');
        }
    }
}

?>
<?php require '../includes/header.php';?>
<div class="mt-4 text-center">
<h1 class="mt-4">Gestion Des Produit</h1>
</div>
<div class="container d-flex justify-content-center mt-4">
  <div class="card mb-4 mt-3" style="width:30rem;">
    <div class="card-header">
    <h3 class="card-title text-center">Nouveau Produit</h3>
    </div>
      <div class="card-body">
        <form method="post">
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">libelle</label>
                <input type="text" name="libelle" id="" class="form-control" placeholder="Votre libelle">
              </div>
              <div class="col">
              <label for="">prix</label>
                <input type="number" name="prix" id="" class="form-control" placeholder="Votre prix">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">categorie</label>
                <select name="codecat" id="" class="form-control">
                <?php while ($categorie = $cate->fetch(PDO::FETCH_OBJ)): ?>
                <option value="<?=$categorie->CODECAT?>"><?=$categorie->NOMCAT?></option>
                <?php endwhile?>
                </select>
              </div>
              <div class="col">
              <label for="">Fornisseur</label>
                <select name="idfournisseur" id="" class="form-control">
                <?php while ($fournisseur = $fourni->fetch(PDO::FETCH_OBJ)): ?>
                <option value="<?=$fournisseur->IDFOURNISSEUR?>"><?=$fournisseur->NOM?></option>
                <?php endwhile?>
                </select>
              </div>
            </div>
              <div class="text-center">
              <input type="submit" name="submit" class="btn btn-primary" value="Soumettre">
              </div>
        </form>
      </div>
  </div>
</div>
<?php require '../includes/footer.php'?>
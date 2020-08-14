<?php
require_once '../database/db.php';
$id = $_GET['id'];
$requette = 'SELECT * FROM fournisseur WHERE IDFOURNISSEUR = :id';
$statement = $db->prepare($requette);
$statement->execute([':id' => $id]);
$fournisseur = $statement->fetch(PDO::FETCH_OBJ);
$message = '';
if (
    isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel'])
) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $requette = 'UPDATE fournisseur SET NOM = :nom , PRENOM= :prenom ,TEL= :tel WHERE IDFOURNISSEUR = :id';
    $statement = $db->prepare($requette);
    if ($statement->execute([':nom' => $nom, ':prenom' => $prenom, ':tel' => $tel, ':id' => $id])) {
        header('location:listes_four.php');
    }
}
?>
<?php require '../includes/header.php';?>
<div class="mt-4 text-center">
<h1 class="mt-4">Gestion Des Fournisseurs</h1>
</div>
<div class="container d-flex justify-content-center mt-4">
  <div class="card mb-4 mt-3" style="width:30rem;">
    <div class="card-header">
    <h3 class="card-title text-center">Modifier Fournisseur</h3>
    </div>
      <div class="card-body">
        <form method="post">
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">Nom</label>
                <input type="text" name="nom" id="" class="form-control" placeholder="Votre nom" value="<?=$fournisseur->NOM?>">
              </div>
              <div class="col">
              <label for="">Prenom</label>
                <input type="text" name="prenom" id="" class="form-control" placeholder="Votre prenom" value="<?=$fournisseur->PRENOM?>">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">tel</label>
                <input type="number" name="tel" id="" class="form-control" placeholder="Votre telephone" value="<?=$fournisseur->TEL?>">
              </div>
            </div>
              <div class="col text-center mt-4">
              <input type="submit" name="submit" class="btn btn-primary" value="Soumettre">
            </div>
        </form>
      </div>
  </div>
</div>
<?php require '../includes/footer.php'?>
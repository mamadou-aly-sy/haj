<?php
require_once '../database/db.php';
$id = $_GET['id'];
$requette = 'SELECT * FROM categorie WHERE CODECAT = :id';
$statement = $db->prepare($requette);
$statement->execute([':id' => $id]);
$categorie = $statement->fetch(PDO::FETCH_OBJ);
$message = '';
if (
    isset($_POST['nomcat']) && isset($_POST['description'])
) {
    $nom = $_POST['nomcat'];
    $description = $_POST['description'];
    $requette = 'UPDATE categorie SET NOMCAT = :nomcat , DESCRIPTION= :description WHERE CODECAT = :id';
    $statement = $db->prepare($requette);
    if ($statement->execute([':nomcat' => $nom, ':description' => $description, ':id' => $id])) {
        header('location:listes_cat.php');
    }
}
?>
<?php require '../includes/header.php'?>
<div class="container d-flex justify-content-center mt-4">
  <div class="card mb-4 mt-3" style="width:20rem;">
    <div class="card-header">
    <h2>Modifier Categorie </h2>
    </div>
    <div class="card-body">
      <form action="" method="post">
        <label for="">Nom Categorie</label>
        <input type="text" name="nomcat" id="" class="form-control" value="<?=$categorie->NOMCAT;?>">
        <label for="">Description</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control" ><?=htmlentities($categorie->DESCRIPTION)?></textarea>
        <div class="col text-center mt-4">
              <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Valide">
            </div>
      </form>
    </div>
  </div>
</div>
<?php require '../includes/footer.php'?>
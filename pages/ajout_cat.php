<?php
if (!empty($_POST)) {

    require_once '../database/db.php';
    $message = '';
    if (
        empty($_POST['nomcat']) || empty($_POST['description'])
    ) {
        $message = 'Veuiller Remplire les champs';
    } else {
        $nom = $_POST['nomcat'];
        $description = $_POST['description'];
        $requette = 'INSERT INTO categorie (NOMCAT,DESCRIPTION)
        VALUE(:nom,:description)';
        $statement = $db->prepare($requette);
        if ($statement->execute([
            ':nom' => $nom, ':description' => $description,
        ])) {
            header('location:listes_com.php');
        }
    }
}
?>
<?php require '../includes/header.php'?>

<div class="container d-flex justify-content-center mt-4">
  <div class="card mb-4 mt-3" style="width:20rem;">
    <div class="card-header">
    <h2>Ajouter Categorie </h2>
    </div>
        <?php if (!empty($message)): ?>
            <div class="alert alert-danger">
              <?php echo $message; ?>
            </div>
        <?php endif;?>
    <div class="card-body">
      <form  method="post">
        <label for="">Nom Categorie</label>
        <input type="text" name="nomcat" id="" class="form-control">
        <label for="">Description</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
        <div class="col text-center mt-4">
              <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Valide">
        </div>
      </form>
    </div>
  </div>
</div>
<?php require '../includes/footer.php'?>
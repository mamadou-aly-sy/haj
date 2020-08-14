<?php
require_once '../database/db.php';
$id = $_GET['id'];
$requette = 'SELECT * FROM client WHERE NUM_CLIENT = :id';
$statement = $db->prepare($requette);
$statement->execute([':id' => $id]);
$client = $statement->fetch(PDO::FETCH_OBJ);
if (
    isset($_POST['nom']) && isset($_POST['raison']) && isset($_POST['fonction'])
    && isset($_POST['tel']) && isset($_POST['fax']) && isset($_POST['adresse'])
) {
    $nom = $_POST['nom'];
    $raison = $_POST['raison'];
    $fonction = $_POST['fonction'];
    $tel = $_POST['tel'];
    $fax = $_POST['fax'];
    $adresse = $_POST['adresse'];
    $requette = 'UPDATE client SET NOMCLIENT=:nom,RAISONSOCIAL=:raison,FONCTION=:fonction,TEL=:tel,FAX=:fax,ADRESS=:adresse WHERE NUM_CLIENT = :id';
    $statement = $db->prepare($requette);
    if ($statement->execute([':nom' => $nom, ':raison' => $raison, ':fonction' => $fonction, ':tel' => $tel,
        ':fax' => $fax, ':adresse' => $adresse, ':id' => $id])) {
        header('location:listes_cli.php');
    }
}
?>
<?php require '../includes/header.php';?>
<div class="mt-4 text-center">
<h1 class="mt-4">Gestion Des Clients</h1>
</div>
<div class="container d-flex justify-content-center mt-4">
  <div class="card mb-4 mt-3" style="width:30rem;">
    <div class="card-header">
    <h3 class="card-title text-center">Modifier Client</h3>
    </div>
      <div class="card-body">
        <form method="post">
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">Nom</label>
                <input type="text" name="nom" id="" class="form-control" placeholder="Votre nom" value="<?=$client->NOMCLIENT?>">
              </div>
              <div class="col">
              <label for="">Raison</label>
                <input type="text" name="raison" id="" class="form-control" placeholder="raison social" value="<?=$client->RAISONSOCIAL?>">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">Fonction</label>
                <input type="text" name="fonction" id="" class="form-control" placeholder="Votre Fonction" value="<?=$client->FONCTION?>">
              </div>
              <div class="col">
              <label for="">Tel</label>
                <input type="tel" name="tel" id="" class="form-control" placeholder="telephone" value="<?=$client->TEL?>">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">fax</label>
                <input type="tel" name="fax" id="" class="form-control" placeholder="Votre fax" value="<?=$client->FAX?>">
              </div>
              <div class="col">
              <label for="">adresse</label>
                <input type="text" name="adresse" id="" class="form-control" placeholder="Votre adresse" value="<?=$client->ADRESS?>">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col text-center mt-4">
              <input type="submit" name="submit" class="btn btn-primary" value="Soumettre">
            </div>
        </form>
      </div>
  </div>
</div>
<?php require '../includes/footer.php'?>
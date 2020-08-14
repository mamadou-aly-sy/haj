<?php
require_once '../database/db.php';
if (!empty($_POST)) {

    $message = '';
    if (
        empty($_POST['nom']) || empty($_POST['raison']) || empty($_POST['fonction'])
        || empty($_POST['tel']) || empty($_POST['fax']) || empty($_POST['adresse'])
    ) {
        $message = 'Veuiller Remplire les champs';
    } else {
        $nom = $_POST['nom'];
        $raison = $_POST['raison'];
        $fonction = $_POST['fonction'];
        $tel = $_POST['tel'];
        $fax = $_POST['fax'];
        $adresse = $_POST['adresse'];
        $requette = 'INSERT INTO client (NOMCLIENT,RAISONSOCIAL,FONCTION,TEL,FAX,ADRESS)
        VALUE(:nom,:raison,:fonction,:tel,:fax,:adresse)';
        $statement = $db->prepare($requette);
        if ($statement->execute([
            ':nom' => $nom, ':raison' => $raison, ':fonction' => $fonction, ':tel' => $tel,
            ':fax' => $fax, ':adresse' => $adresse,
        ])) {
            header('location:listes_cli.php');
        }
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
    <h3 class="card-title text-center">Nouveau Client</h3>
    </div>
      <div class="card-body">
        <form method="post">
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">Nom</label>
                <input type="text" name="nom" id="" class="form-control" placeholder="Votre nom">
              </div>
              <div class="col">
              <label for="">Raison</label>
                <input type="text" name="raison" id="" class="form-control" placeholder="raison social">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">Fonction</label>
                <input type="text" name="fonction" id="" class="form-control" placeholder="Votre Fonction">
              </div>
              <div class="col">
              <label for="">Tel</label>
                <input type="tel" name="tel" id="" class="form-control" placeholder="telephone">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">fax</label>
                <input type="tel" name="fax" id="" class="form-control" placeholder="Votre fax">
              </div>
              <div class="col">
              <label for="">adresse</label>
                <input type="text" name="adresse" id="" class="form-control" placeholder="Votre adresse">
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
<?php
require '../includes/header.php';
?>
<?php

require '../database/db.php';

$id = $_GET['id'];
$requette = 'SELECT * FROM utilisateur WHERE IDUSER = :id';
$statement = $db->prepare($requette);
$statement->execute([':id' => $id]);
$utilisateur = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login'])
    && isset($_POST['password']) && isset($_POST['profil'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $profil = $_POST['profil'];
    $requette = 'UPDATE utilisateur SET NOM = :nom, PRENOM =:prenom, LOGIN =:login, MDP =:password,IDPROFIL =:profil WHERE IDUSER = :id';
    $statement = $db->prepare($requette);
    if ($statement->execute([':nom' => $nom, ':prenom' => $prenom, ':login' => $login, ':password' => $password, ':profil' => $profil, ':id' => $id])) {
        header('location:listes_users.php');
    }
}
?>
<div class="mt-4 text-center">
<h1 class="mt-4">Gestion Des Uttilisateurs</h1>
</div>
<div class="container d-flex justify-content-center mt-4">
  <div class="card mb-4 mt-3" style="width:30rem;">
    <div class="card-header">
    <h3 class="card-title text-center">Modifier Utilisateur</h3>
    </div>
      <div class="card-body">
        <form action="" method="post">
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">Nom</label>
                <input type="text" name="nom"  class="form-control" placeholder="Votre nom" value="<?=$utilisateur->NOM;?>">
              </div>
              <div class="col">
              <label for="">Prenom</label>
                <input type="text" name="prenom"  class="form-control" placeholder="Votre prenom" value="<?=$utilisateur->PRENOM;?>">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">login</label>
                <input type="login" name="login"  class="form-control" placeholder="Votre login" value="<?=$utilisateur->LOGIN;?>">
              </div>
              <div class="col">
              <label for="">mot de passe</label>
                <input type="password" name="password"  class="form-control" placeholder="Votre mot de passe" value="<?=$utilisateur->MDP;?>">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">Profils</label>
                <select name="profil"  class="form-control" value="<?=$utilisateur->IDPROFIL;?>">
                <option value="1">Administrateur</option>
                <option value="2">Approviseur</option>
                <option value="3">Vendeur</option>
                </select>
              </div>
              <div class="col text-center mt-4">
              <input type="submit" name="submit" class="btn btn-primary" value="Soumettre">
            </div>
        </form>
      </div>
  </div>
</div>
<?php require '../includes/footer.php'?>
<?php
require '../includes/header.php';
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
        <form action="listes_users.php" method="post">
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">Nom</label>
                <input type="text" name="nom" id="" class="form-control" placeholder="Votre nom" value="<?php $_POST['nom']?>">
              </div>
              <div class="col">
              <label for="">Prenom</label>
                <input type="text" name="prenom" id="" class="form-control" placeholder="Votre prenom" value="<?php $_POST['prenom']?>">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">login</label>
                <input type="login" name="login" id="" class="form-control" placeholder="Votre login" value="<?php $_POST['login']?>">
              </div>
              <div class="col">
              <label for="">mot de passe</label>
                <input type="password" name="mot de passe" id="" class="form-control" placeholder="Votre mot de passe" value="<?php $_POST['']?>">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">Profils</label>
                <select name="profil" id="" class="form-control" value="<?php $_POST['profil']?>">
                <option value="Administrateur">Administrateur</option>
                <option value="Approviseur">Approviseur</option>
                <option value="Vendeur">Vendeur</option>
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
<?php
require '../includes/header.php';
?>
<div class="mt-4 text-center">
<h1 class="mt-4">Gestion Des Fournisseurs</h1>
</div>
<div class="container d-flex justify-content-center mt-4">
  <div class="card mb-4 mt-3" style="width:30rem;">
    <div class="card-header">
    <h3 class="card-title text-center">Modifier Fournisseur</h3>
    </div>
      <div class="card-body">
        <form action="listes_four.php" method="post">
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">Nom</label>
                <input type="text" name="nom" id="" class="form-control" placeholder="Votre nom">
              </div>
              <div class="col">
              <label for="">Prenom</label>
                <input type="text" name="prenom" id="" class="form-control" placeholder="Votre prenom">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">tel</label>
                <input type="number" name="tel" id="" class="form-control" placeholder="Votre telephone">
              </div>
            </div>
              <div class="col text-center mt-4">
              <input type="submit" name="submit" class="btn btn-primary" value="Soumettre">
            </div>
        </form>
      </div>
  </div>
</div>

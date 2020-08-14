<?php
require '../includes/header.php';
?>
<div class="mt-4 text-center">
<h1 class="mt-4">Gestion Des Commandes</h1>
</div>
<div class="container d-flex justify-content-center mt-4">
  <div class="card mb-4 mt-3" style="width:30rem;">
    <div class="card-header">
    <h3 class="card-title text-center">Nouvelle Commande</h3>
      <div class="card-body">
        <form action="listes_com.php" method="post">
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">Nom Client</label>
                <input type="text" name="nom-client" id="" class="form-control">
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
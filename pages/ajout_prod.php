<?php
require '../includes/header.php';
?>
<div class="mt-4 text-center">
<h1 class="mt-4">Gestion Des Produit</h1>
</div>
<div class="container d-flex justify-content-center mt-4">
  <div class="card mb-4 mt-3" style="width:30rem;">
    <div class="card-header">
    <h3 class="card-title text-center">Nouveau Produit</h3>
    </div>
      <div class="card-body">
        <form action="listes_prod.php" method="post">
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
              <label for="">Categorie</label>
                <select name="profil" id="" class="form-control">
                <option value="Administrateur">Boisson</option>
                </select>
              </div>
              <div class="col">
              <label for="">Fornisseur</label>
                <select name="profil" id="" class="form-control">
                <option value="moustapha">moustapha</option>
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

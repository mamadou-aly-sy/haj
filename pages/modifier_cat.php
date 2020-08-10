<?php require '../includes/header.php'?>

<div class="container d-flex justify-content-center mt-4">
  <div class="card mb-4 mt-3" style="width:20rem;">
    <div class="card-header">
    <h2>Modifier Categorie </h2>
    </div>
    <div class="card-body">
      <form action="" method="post">
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

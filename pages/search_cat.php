<?php require '../database/db.php';?>
<?php

if (isset($_GET['search'])) {
    //$message = "";
    $search = $_GET['search'];
    $requette = 'SELECT * FROM categorie WHERE NOMCAT LIKE :search OR CODECAT LIKE :search ';
    $statement = $db->prepare($requette);
    $statement->bindValue(':search', '%' . $search . '%');
    $statement->execute();
    $recherche = $statement->fetchAll(PDO::FETCH_OBJ);

    if (empty($recherche)) {
        $message = "categorie introuvable";
    }
}
?>
<?php require '../includes/header.php'?>
<div class="container">
<h1 class="text-center mt-4">Gestion des Catégories</h1>
  <div class="card-body bg-light">
  <?php if (!empty($message)): ?>
  <div class="alert alert-danger">
  <?=$message?>
  </div>
  <?php endif?>
        <div class="collapse nav">
          <ul class="nav mr-auto">
            <li><a href="../src/index_admin.php" class="mr-3"><i class="fas fa-home"></i>Acceuil</button></a></li>
            <li><a href="ajout_cat.php" class="ml-2"><i class="fas fa-user-plus"></i>Ajout</button></a></li>
          </ul>
          <form class="form-inline my-2 my-lg-0 ">
            <input class="form-control mr-sm-2 mb-1" type="search" placeholder="Rechercher ici"class="fas fa-search" aria-label="Search" name="search">
            <button class="btn btn-outline-warning my-2 my-sm-0 mt-2" type="submit">Rechercher</button>
          </form>
        </div>
    <table id="dtBasicExample" class="table table-bordered table-sm" cellspacing="0" width="100%">
      <thead class="thead-light">
        <tr class="text-center text-black">
          <th scope="col">Id</th>
          <th scope="col">Nom</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody class="text-black">
        <!-- <div class="alert alert-danger">le champs est vide !!</div> -->
        <?php foreach ($recherche as $cat): ?>
        <tr class="text-center">
          <td scope="row"><?=$cat->CODECAT;?></td>
          <td><?=$cat->NOMCAT;?></td>
          <td><?=$cat->DESCRIPTION;?></td>
          <td class="text-right">
          <a href="modifier_cat.php?id=<?=$cat->CODECAT;?>"><button class="btn btn-primary"><i class="far fa-edit"></i> Edit</button></a>
          <a href="../libs/delete_cat.php?id=<?=$cat->CODECAT;?>"><button class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce employe ?');" ><i class="far fa-trash-alt"></i> Supprimer</button></a>
          </td>
        </tr>
        <?php endforeach?>
      </tbody>
    </table>
  </div>
</div>
<?php require '../includes/footer.php'?>
<?php

require '../database/db.php';

$requette = 'SELECT * FROM fournisseur';
$statement = $db->prepare($requette);
$statement->execute();
$fournisseur = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require '../includes/header.php'?>
<div class="container">
<h1 class="text-center mt-4">Gestion des Fournisseurs</h1>
  <div class="card-body bg-light">
        <div class="collapse nav">
          <ul class="nav mr-auto">
            <li><a href="../src/index_admin.php" class="mr-3"><i class="fas fa-home"></i>Acceuil</button></a></li>
            <li><a href="ajout_four.php" class="ml-2"><i class="fas fa-user-plus"></i>Ajout</button></a></li>
          </ul>
          <form class="form-inline my-2 my-lg-0 " action="./search_four.php" method="get">
            <input class="form-control mr-sm-2 mb-1" type="search" placeholder="Rechercher ici"class="fas fa-search" aria-label="Search" name="search">
            <button class="btn btn-outline-warning my-2 my-sm-0 mt-2" type="submit">Rechercher</button>
          </form>
        </div>
    <table id="dtBasicExample" class="table table-bordered table-sm" cellspacing="0" width="100%">
      <thead class="thead-light">
        <tr class="text-center text-black">
          <th scope="col">Id</th>
          <th scope="col">Nom</th>
          <th scope="col">prenom</th>
          <th scope="col">telephone</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody class="text-black">
        <!-- <div class="alert alert-danger">le champs est vide !!</div> -->
        <?php foreach ($fournisseur as $four): ?>
        <tr class="text-center">
          <td scope="row"><?=$four->IDFOURNISSEUR?></td>
          <td><?=$four->NOM?></td>
          <td><?=$four->PRENOM?></td>
          <td><?=$four->TEL?></td>
          <td class="text-right">
          <a href="modifier_four.php?id=<?=$four->IDFOURNISSEUR?>"><button class="btn btn-primary"><i class="far fa-edit"></i> Edit</button></a>
          <a href="../libs/delete_four.php?id=<?=$four->IDFOURNISSEUR?>"><button class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce employe ?');" ><i class="far fa-trash-alt"></i> Supprimer</button></a>
          </td>
        </tr>
        <?php endforeach?>
      </tbody>
    </table>
  </div>
</div>
<?php require '../includes/footer.php'?>
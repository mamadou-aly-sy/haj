<?php

require '../database/db.php';

$requette = 'SELECT REFERENCE,LIBELLE,PRIX, NOMCAT, NOM FROM produit LEFT OUTER JOIN categorie ON produit.CODECAT = categorie.CODECAT LEFT OUTER JOIN fournisseur ON produit.IDFOURNISSEUR = fournisseur.IDFOURNISSEUR';
$statement = $db->prepare($requette);
$statement->execute();
$produit = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require '../includes/header.php'?>
<div class="container">
<h1 class="text-center mt-4">Gestion des Produits</h1>
  <div class="card-body bg-light">
        <div class="collapse nav">
          <ul class="nav mr-auto">
            <li><a href="../src/index_admin.php" class="mr-3"><i class="fas fa-home"></i>Acceuil</button></a></li>
            <li><a href="ajout_prod.php" class="ml-2"><i class="fas fa-user-plus"></i>Ajout</button></a></li>
          </ul>
          <form class="form-inline my-2 my-lg-0 ">
            <input class="form-control mr-sm-2 mb-1" type="search" placeholder="Rechercher ici"class="fas fa-search" aria-label="Search" name="recherche">
            <button class="btn btn-outline-warning my-2 my-sm-0 mt-2" type="submit">Rechercher</button>
          </form>
        </div>
    <table id="dtBasicExample" class="table table-bordered table-sm" cellspacing="0" width="100%">
      <thead class="thead-light">
        <tr class="text-center text-black">
          <th scope="col">Reference</th>
          <th scope="col">Libelle</th>
          <th scope="col">Prix</th>
          <th scope="col">Categorie</th>
          <th scope="col">Formnisseur</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody class="text-black">
        <!-- <div class="alert alert-danger">le champs est vide !!</div> -->
        <?php foreach ($produit as $prod): ?>
        <tr class="text-center">
          <td scope="row"><?=$prod->REFERENCE?></td>
          <td><?=$prod->LIBELLE?></td>
          <td><?=$prod->PRIX?></td>
          <td><?=$prod->NOMCAT?></td>
          <td><?=$prod->NOM?></td>
          <td class="text-right">
          <a href="./modifier_prod.php?id=<?=$prod->REFERENCE?>"><button class="btn btn-primary"><i class="far fa-edit"></i> Edit</button></a>
          <a href="../libs/delete_prod.php?id=<?=$prod->REFERENCE?>"><button class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce employe ?');" ><i class="far fa-trash-alt"></i> Supprimer</button></a>
          </td>
        </tr>
        <?php endforeach?>
      </tbody>
    </table>
  </div>
</div>
<?php require '../includes/footer.php'?>
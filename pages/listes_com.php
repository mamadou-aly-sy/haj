<?php require '../includes/header.php'?>
<div class="container">
<h1 class="text-center mt-4">Gestion des Commandes</h1>
  <div class="card-body bg-light">
        <div class="collapse nav">
          <ul class="nav mr-auto">
            <li><a href="../src/index_admin.php" class="mr-3"><i class="fas fa-home"></i>Acceuil</button></a></li>
            <li><a href="ajout_com.php" class="ml-2"><i class="fas fa-user-plus"></i>Ajout</button></a></li>
          </ul>
          <form class="form-inline my-2 my-lg-0 " action="../src/recherche.php">
            <input class="form-control mr-sm-2 mb-1" type="search" placeholder="Rechercher ici"class="fas fa-search" aria-label="Search" name="recherche">
            <button class="btn btn-outline-warning my-2 my-sm-0 mt-2" type="submit">Rechercher</button>
          </form>
        </div>
    <table id="dtBasicExample" class="table table-bordered table-sm" cellspacing="0" width="100%">
      <thead class="thead-light">
        <tr class="text-center text-black">
          <th scope="col">Numero</th>
          <th scope="col">nom client</th>
          <th scope="col">Date_commande</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody class="text-black">
        <!-- <div class="alert alert-danger">le champs est vide !!</div> -->
        <tr class="text-center">
          <td scope="row">1</td>
          <td>2727333</td>
          <td>12/12/2020</td>
          <td class="text-right">
          <a href=""><button class="btn btn-primary"><i class="far fa-edit"></i> Edit</button></a>
          <a href=""><button class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce employe ?');" ><i class="far fa-trash-alt"></i> Supprimer</button></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php require '../includes/footer.php'?>
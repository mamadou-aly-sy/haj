<?php require '../includes/header.php';?>
<?php
require_once '../database/db.php';
$profil = 'SELECT IDPROFIL,LIBELEPROFIL FROM profil';
$profils = $db->prepare($profil);
$profils->execute();
if (!empty($_POST)) {

    $message = '';
    if (
        empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login'])
        || empty($_POST['password']) || empty($_POST['profil'])
    ) {
        $message = 'Veuiller Remplire les champs';
    } else {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $login = $_POST['login'];
        $password = sha1($_POST['password']);
        $profil = $_POST['profil'];
        $requette = 'INSERT INTO utilisateur (NOM,PRENOM,LOGIN,MDP,IDPROFIL)
        VALUE(:nom,:prenom,:login,:password,:profil)';
        $statement = $db->prepare($requette);
        if ($statement->execute([
            ':nom' => $nom, ':prenom' => $prenom, ':login' => $login,
            ':password' => $password, ':profil' => $profil,
        ])) {
            header('location:listes_users.php');
        }
    }
}
?>
<div class="mt-4 text-center">
<h1 class="mt-4">Gestion Des Uttilisateurs</h1>
</div>
<?php if (!empty($message)): ?>
                <div class="alert alert-danger">
                    <?php echo $message; ?>
                </div>
            <?php endif;?>
<div class="container d-flex justify-content-center mt-4">
  <div class="card mb-4 mt-3" style="width:30rem;">
    <div class="card-header">
    <h3 class="card-title text-center">Nouveau Utilisateur</h3>
    </div>
      <div class="card-body">
        <form method="post">
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
              <label for="">login</label>
                <input type="login" name="login" id="" class="form-control" placeholder="Votre login">
              </div>
              <div class="col">
              <label for="">mot de passe</label>
                <input type="password" name="password" id="" class="form-control" placeholder="Votre mot de passe">
              </div>
            </div>
            <div class="row mb-2 mt-2">
              <div class="col">
              <label for="">Profils</label>
                <select name="profil" id="" class="form-control">
                <?php while ($profil = $profils->fetch(PDO::FETCH_OBJ)): ?>
                <option value="<?=$profil->IDPROFIL?>"><?=$profil->LIBELEPROFIL?></option>
                <?php endwhile?>
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
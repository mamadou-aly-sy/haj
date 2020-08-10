<?php session_start();
require '../database/db.php';
$user = $_SESSION['PROFIL'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/all.css">
  <script src="../js/babel.js"></script>
  <script src="../js/react.js"></script>
  <script src="../js/react-dom.js"></script>

  <title><?php if (isset($title)) {
    echo $title;} else {
    echo "App";
}?></title>
</head>
<body class="">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="" style="font-size:20px;">
      <?php if ($user['IDPROFIL'] == 1) {
    echo "Administrateur";
} elseif ($user['IDPROFIL'] == 2) {
    echo "Approviseur";

} elseif ($user['IDPROFIL'] == 3) {
    echo "Vendeur";
} else {
    echo "Application";
}
?>
</a>
    </div>
    <div class="collapse navbar-collapse">
    <?php if ($user['IDPROFIL'] == 1): ?>
      <ul class="navbar-nav mr-auto">
        <li class="nav-items"><a href="../pages/listes_users.php"class="nav-link text-white btn">G. Utilisateurs</a></li>
        <li class="nav-items"><a href="../pages/listes_cat.php"class="nav-link text-white btn">G. Gatégories</a></li>
        <li class="nav-items"><a href="../pages/listes_prod.php"class="nav-link text-white btn">G. Produits</a></li>
        <li class="nav-items"><a href="../pages/listes_four.php"class="nav-link text-white btn">G. Fornisseurs</a></li>
        <li class="nav-items"><a href="../pages/listes_cli.php"class="nav-link text-white btn">G. Clients</a></li>
        <li class="nav-items"><a href="../pages/listes_com.php"class="nav-link text-white btn">G. Commandes</a></li>
      </ul>
    <?php elseif ($user['IDPROFIL'] == 2): ?>
      <ul class="navbar-nav mr-auto">
        <li class="nav-items"><a href=""class="nav-link text-white btn">G. Gatégories</a></li>
        <li class="nav-items"><a href=""class="nav-link text-white btn">G. Produits</a></li>
        <li class="nav-items"><a href=""class="nav-link text-white btn">G. Fornisseurs</a></li>
      </ul>
    <?php elseif ($user['IDPROFIL'] == 3): ?>
      <ul class="navbar-nav mr-auto">
        <li class="nav-items"><a href=""class="nav-link text-white btn">G. Clients</a></li>
        <li class="nav-items"><a href=""class="nav-link text-white btn">G. Commandes</a></li>
      </ul>
    <?php endif?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="../libs/logout.php" class="nav-link btn btn-danger text-white"> Deconnecte<a></li>
      <ul>
    </div>
  </nav>